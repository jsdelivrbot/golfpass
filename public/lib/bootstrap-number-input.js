
/* ========================================================================
 * bootstrap-spin - v1.0
 * https://github.com/wpic/bootstrap-spin
 * ========================================================================
 * Copyright 2014 WPIC, Hamed Abdollahpour
 *
 * ========================================================================
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================================
 */

 (function ( $ ) {

 	$.fn.bootstrapNumber = function( options ) {

 		var settings = $.extend({
 			upClass: 'default',
 			downClass: 'default',
 			upText: '+',
 			downText: '-',
 			center: true
 		}, options );

 		return this.each(function(e) {
 			var self = $(this);
 			var clone = self.clone(true, true);

 			var min = self.attr('min');
 			var max = self.attr('max');
 			var step = parseInt(self.attr('step')) || 1;

 			function setText(n) {
 				if (isNaN(n) || (min && n < min) || (max && n > max)) {
 					return false;
 				}

 				clone.focus().val(n);
 				clone.trigger('change');
 				return true;
 			}

 			var group = $("<div class='input-group'></div>");
 			var down = $("<button type='button'>" + settings.downText + "</button>").attr('class', 'btn btn-' + settings.downClass).click(function(){
 				if(options.event !== false)
 				{
 					setText(parseInt(clone.val() || clone.attr('value')) - step);
 				}
 				if(options.groupEvent === true){
 						eventMius(this);
 				}

 			});
 			var up = $("<button type='button'>" + settings.upText + "</button>").attr('class', 'btn btn-' + settings.upClass).click(function() {
 				if(options.event !== false)
 				{
 					setText(parseInt(clone.val() || clone.attr('value')) + step);
 				}
 				if(options.groupEvent === true){
 						eventAdd(this);
 				}
 			});
 			$("<span class='input-group-btn'></span>").append(down).appendTo(group);
 			clone.appendTo(group);
 			if(clone && settings.center) {
 				clone.css('text-align', 'center');
 			}
 			$("<span class='input-group-btn' style='board-radius:0px;'></span>").append(up).appendTo(group);
 			if(options.checkBtn === true)
 			{
 				$("<span class='input-group-btn' style='display:table-cell;border-left: 0px solid'><button id='j-group-add-btn' style='border-left: 0px solid;'class='btn btn-default'><sapn class='xi-check'></span></button id='j-group-add-btn'></sapn>").appendTo(group);	
 			}

			// remove spins from original
			clone.prop('type', 'text').keydown(function(e) {
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					(e.keyCode == 65 && e.ctrlKey === true) ||
					(e.keyCode >= 35 && e.keyCode <= 39)) {
					return;
			}
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}

			var c = String.fromCharCode(e.which);
			var n = parseInt(clone.val() + c);

			if ((min && n < min) || (max && n > max)) {
				e.preventDefault();
			}
		});

			self.replaceWith(group);
		});
 	};
 } ( jQuery ));

function eventMius(e)
    {
          //2일떄 return false
          $thisBtn = $(e);
          $thisItem = $($thisBtn.parents(".input-group")[0]);
          $thisItemInput =$thisItem.find(".j-group-modal-item");
          var thisVal = $thisItemInput.val();
          if(thisVal=== "2")
          {
            return false;
        }
        $thisItemInput.val(parseInt(thisVal)-1);

        //마지막 +1

        var val =$lastItemInput.val();
        val =parseInt(val);
        $lastItemInput.val(val+1);
        val =$lastItemInput.val();
        //마지막이 5가되면 3이되고 2추가
        if(val === "5")
        {
            $lastItemInput.val(3);
            // $item=addModalGroupItem(2);
             var $item =$j_group_modal_item.clone();
        $item.css("display","inline-block");
        $item.val(2);
        $j_group_wapper.append($item);
        $item.bootstrapNumber({
            upClass: 'item-up',
            downClass: 'item-down',
            event: false,
            groupEvent : true
        });
            console.log($item);
            $btn=$($item.parents(".input-group")[0]);
            console.log($btn);
            // $($item.parents(".input-group")[0]).find(".btn-item-up").click(function(){
            //      eventAdd(this);        
            // });
        }
        getVariableItems();
    }
function eventAdd(e)
    {
        console.log("add");
       var val =$lastItemInput.val();
        //맽밑이 2이고 3하나 4조합일떄 +불가능
        var num_val_3 = 0;
        var sw_val_3_or_4 =true;
        if(val === "2")
        {
            for(var i =0 ; i<$withoutLastChildItems.length; i++)
            {
                $input= $($withoutLastChildItems[i]).find(".j-group-modal-item");
                if($input.val() !== "3" && $input.val() !== "4")
                {
                    sw_val_3_or_4 = false;
                }
                if($input.val() === "3")
                {
                    num_val_3 += 1;
                }
            }
            if(sw_val_3_or_4 === true && num_val_3 === 1)
            {
                return false;
            }
        }
        //4일떄 return false
        $thisBtn = $(e);
        $thisItem = $($thisBtn.parents(".input-group")[0]);
        $thisItemInput =$thisItem.find(".j-group-modal-item");
        var thisVal = $thisItemInput.val();
        if(thisVal=== "4")
        {
            return false;
        }
        $thisItemInput.val(parseInt(thisVal)+1);

        //마지막 -
        
        $lastItemInput.val(val-1);
        val =$lastItemInput.val();
        //마지막이 1이면 없애고 위에꺼 +1
        if(val === "1")
        {
            $prevItem =$lastItem.prev();
            $prevItemInput = $prevItem.find(".j-group-modal-item");
            $lastItem.remove();
            var tmpVal =$prevItemInput.val();
            tmpVal = parseInt(tmpVal);
            $prevItemInput.val(tmpVal+1);
        }

        //5가되면 4가되고 위에꺼 +1
        for(var i = $withoutLastChildItems.length-1 ;i >= 0  ; i--)
        {
            $item =$($withoutLastChildItems[i]);
            $itemInput =$item.find(".j-group-modal-item");
            if($itemInput.val() === "5")
            {
                $itemInput.val(4);
                $prevItem =$item.prev();
                $prevItemInput = $prevItem.find(".j-group-modal-item");
                var tmpVal =$prevItemInput.val();
                tmpVal = parseInt(tmpVal);
                $prevItemInput.val(tmpVal+1);

            }
        }
        getVariableItems();
    }
