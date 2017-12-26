$(document).ready(function () {
    const Currenttags = [ /*현재 페이지의 태그들*/ ];
    $(".menu").click(function () {
        removeTags();
        console.log($(this).text());
        if ($(this).text() != 'ALL') {
            $("#sidenav .darkBox").css('display', 'block');
            addTag(['tag1', 'tag2', 'tag3', 'tag4', 'tag5']);
            //변경후 해당 메뉴에 태그도 출력    
        } else {
            /*전체선택시 페이지 이동*/

            console.log("test");
            $("#sidenav .darkBox").css('display', 'none');
        }
        $("#menubox>.current").removeClass("current");
        $(this).parent('li').addClass("current");
    });

    function addTag(tags) {
        //태그가 리스트나 배열로 들어오고 출력
        for (var i = 0; i < tags.length; i++) {
            let newTag = $("<div class='tagbox'><p class='tag'>" + tags[i] + "</p></div>");
            $("#sideTagContainer").append(newTag);
        }
        //태그 클릭시 선택
        $('.tag').click(function () {
            if ($(this).hasClass('choice')) {
                unChoiceTag($(this));
                console.log('태그선택');
                return;
            } else {
                choiceTag($(this));
                console.log('태그삭제');
                return;
            }
        });

    }
    //태그 선택
    function choiceTag(tag) {
        tag.addClass("choice");
    }
    //태그 삭제
    function unChoiceTag(tag) {
        tag.removeClass("choice");
    }

    function removeTags() {
        $("#sideTagContainer").empty();
    }







    /* 캘린더
	1) 매년 2월은 28일이다.
	2) 매년 2월중에서 년도수가 4의 배수일 경우에는 2월이 29일이다.
	3) 1월 : 31일, 2월 28일 or 29일, 3월 31일, 4월 30일, 5월 31일, 
	   6월 30일, 7월 : 31일, 8월 31일, 9월 30일, 10월 31일, 11월 30일, 
	   12월 31일
*/
    const today = new Date();

    function getTotalDate(year, month) {
        if (month == 4 || month == 6 || month == 9 || month == 11)
            return 30;
        else if (month == 2) //2월일때
        {
            if (year % 4 == 0) // 2월이면서 윤년일 때
                return 29;
            else // 2월이면서 윤년이 아닐 때
                return 28
        } else
            return 31;
    }

    function writeCalendar(date) {
        const month = date.getMonth() + 1
        //입력날짜에 첫날
        let startdate = new Date(date.getFullYear() + "/" + (month) + "/1");
        const week = startdate.getDay();
        const enddate = getTotalDate(date.getFullYear(), month);
        const prevEnddate = getTotalDate(date.getFullYear(), month - 1);
        console.log("이번달 : " + month);
        console.log("요일 : " + week);
        $("#calNum").empty();
        for (var i = (1 - week); i < enddate; i++) {
            if (i <= 0) {
                $("#calNum").append("<li></li");
            } else {
                $("#calNum").append("<li>" + (i < 10 ? '&nbsp' + i : i) + "</li");
            }

        }

    }

    $('#prevMonth').click(function () {
        let year = $('#year').text();
        let month = $('#month').text();
        $('#month').text(month - 1);
        if (month != 1 && month < today.getMonth + 1) {
            $('#nextMonth').text('>');
            writeCalendar(new Date(year + '/' + (month - 1)));
        } else if (month == 1) {
            $('#year').text(year - 1);
            $('#month').text(12);
            writeCalendar(new Date($('#year').text() + '/' + ($('#month').text()) - 1));
        }
    });
    $('#nextMonth').click(function () {
        let year = $('#year').text();
        let month = $('#month').text();
        console.log("test" + month);
        if (year == (today.getFullYear()) && month == (parseInt(today.getMonth()))) {
            $('#nextMonth').text('');
        }
        $('#month').text(parseInt(month) + 1);
        writeCalendar(new Date(year + '/' + (parseInt(month) + 1)));
        if (month == 12) {
            console.log("test!!!!")
            month = $('#month').text(1).text();
            year = $('#year').text(parseInt(year) + 1).text();
            writeCalendar(new Date(year + '/1'));
        }

    });

    function init() {
        /*초기화 메소드*/
        writeCalendar(today); /*켈린더 브라우저에 출력*/
        $("#sidenav .darkBox").css('display', 'none');
    };
    init(); /*초기화 메소드 실행*/
    $("#adminToggle").click(function () {
        $("#admin_menu").toggle("none", function () {});
    });




    /*등록시 태그선택*/
    $(".updateTag").click(function () {
        console.log($(this).text());
        let temp = $("#input_tags").val();
        let checkfirst = (temp == "");
        let choicetag = $(this).text();
        if (temp.indexOf(choicetag) == -1) {
            let choiceTag = checkfirst ? ("#" + $(this).text()) : ",#" + $(this).text();
            $("#input_tags").val(temp + choiceTag);
        }
    });
});
