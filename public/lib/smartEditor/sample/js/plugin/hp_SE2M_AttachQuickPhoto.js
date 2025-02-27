/**
 * @use ๊ฐ๋จ ?ฌํ  ?๋ก?์ฉ?ผ๋ก ?์?์?ต๋??
 * @author cielo
 * @See nhn.husky.SE2M_Configuration 
 * @ ?์ ๋งํฌ?์? SimplePhotoUpload.html๊ณ?SimplePhotoUpload_html5.html???์ต?๋ค. 
 */

nhn.husky.SE2M_AttachQuickPhoto = jindo.$Class({		
	name : "SE2M_AttachQuickPhoto",

	$init : function(){},
	
	$ON_MSG_APP_READY : function(){
		this.oApp.exec("REGISTER_UI_EVENT", ["photo_attach", "click", "ATTACHPHOTO_OPEN_WINDOW"]);
	},
	
	$LOCAL_BEFORE_FIRST : function(sMsg){
		if(!!this.oPopupMgr){ return; }
		// Popup Manager?์ ?ฌ์ฉ??param
		this.htPopupOption = {
			oApp : this.oApp,
			sName : this.name,
			bScroll : false,
			sProperties : "",
			sUrl : ""
		};
		this.oPopupMgr = nhn.husky.PopUpManager.getInstance(this.oApp);
	},
	
	/**
	 * ?ฌํ  ?นํ ?คํ
	 */
	$ON_ATTACHPHOTO_OPEN_WINDOW : function(){			
		this.htPopupOption.sUrl = this.makePopupURL();
		this.htPopupOption.sProperties = "left=0,top=0,width=403,height=359,scrollbars=yes,location=no,status=0,resizable=no";

		this.oPopupWindow = this.oPopupMgr.openWindow(this.htPopupOption);
		
		// ์ฒ์ ๋ก๋ฉ?๊ณ  IE?์ ์ปค์๊ฐ ?ํ? ?๋ ๊ฒฝ์ฐ
		// ๋ณต์ ?๋ก?์???์๊ฐ ๋ฐ๋?
		// [SMARTEDITORSUS-1698]
		this.oApp.exec('FOCUS', [true]);
		// --[SMARTEDITORSUS-1698]
		return (!!this.oPopupWindow ? true : false);
	},
	
	/**
	 * ?๋น?ค๋ณ๋ก??์?? parameter๋ฅ?์ถ๊??์ฌ URL???์ฑ?๋ ?จ์	 
	 * nhn.husky.SE2M_AttachQuickPhoto.prototype.makePopupURL๋ก???ด?จ์ ?ฌ์ฉ?์๋ฉ???
	 */
	makePopupURL : function(){
		var sPopupUrl = "./sample/photo_uploader/photo_uploader.html";
		
		return sPopupUrl;
	},
	
	/**
	 * ?์?์ ?ธ์ถ?๋ ๋ฉ์ธ์ง.
	 */
	$ON_SET_PHOTO : function(aPhotoData){
		var sContents, 
			aPhotoInfo,
			htData;
		
		if( !aPhotoData ){ 
			return; 
		}
		
		try{
			sContents = "";
			for(var i = 0; i <aPhotoData.length; i++){				
				htData = aPhotoData[i];
				
				if(!htData.sAlign){
					htData.sAlign = "";
				}
				
				aPhotoInfo = {
				    sName : htData.sFileName || "",
				    sOriginalImageURL : htData.sFileURL,
					bNewLine : htData.bNewLine || false 
				};
				
				sContents += this._getPhotoTag(aPhotoInfo);
			}

			this.oApp.exec("PASTE_HTML", [sContents]); // ?์ฆ ์ฒจ๋? ?์ผ ๋ถ๋ถ??์ธ
		}catch(e){
			// upload??error๋ฐ์????ด์ skip??
			return false;
		}
	},

	/**
	 * @use ?ผ๋ฐ ?ฌํ  tag ?์ฑ
	 */
	_getPhotoTag : function(htPhotoInfo){
		// id? class???ธ๋ค?ผ๊ณผ ?ฐ๊???๋ง์ต?๋ค. ?์ ???ธ๋ค???์ญ??Test
		var sTag = '<img src="{=sOriginalImageURL}" alt="{=sName}" >';
		if(htPhotoInfo.bNewLine){
			sTag += '<br style="clear:both;">';
		}
		sTag = jindo.$Template(sTag).process(htPhotoInfo);
		
		return sTag;
	}
});