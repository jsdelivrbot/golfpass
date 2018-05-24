/**
 * @use ê°„ë‹¨ ?¬í†  ?…ë¡œ?œìš©?¼ë¡œ ?œì‘?˜ì—ˆ?µë‹ˆ??
 * @author cielo
 * @See nhn.husky.SE2M_Configuration 
 * @ ?ì—… ë§ˆí¬?…ì? SimplePhotoUpload.htmlê³?SimplePhotoUpload_html5.html???ˆìŠµ?ˆë‹¤. 
 */

nhn.husky.SE2M_AttachQuickPhoto = jindo.$Class({		
	name : "SE2M_AttachQuickPhoto",

	$init : function(){},
	
	$ON_MSG_APP_READY : function(){
		this.oApp.exec("REGISTER_UI_EVENT", ["photo_attach", "click", "ATTACHPHOTO_OPEN_WINDOW"]);
	},
	
	$LOCAL_BEFORE_FIRST : function(sMsg){
		if(!!this.oPopupMgr){ return; }
		// Popup Manager?ì„œ ?¬ìš©??param
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
	 * ?¬í†  ?¹íƒ‘ ?¤í”ˆ
	 */
	$ON_ATTACHPHOTO_OPEN_WINDOW : function(){			
		this.htPopupOption.sUrl = this.makePopupURL();
		this.htPopupOption.sProperties = "left=0,top=0,width=403,height=359,scrollbars=yes,location=no,status=0,resizable=no";

		this.oPopupWindow = this.oPopupMgr.openWindow(this.htPopupOption);
		
		// ì²˜ìŒ ë¡œë”©?˜ê³  IE?ì„œ ì»¤ì„œê°€ ?„í? ?†ëŠ” ê²½ìš°
		// ë³µìˆ˜ ?…ë¡œ?œì‹œ???œì„œê°€ ë°”ë€?
		// [SMARTEDITORSUS-1698]
		this.oApp.exec('FOCUS', [true]);
		// --[SMARTEDITORSUS-1698]
		return (!!this.oPopupWindow ? true : false);
	},
	
	/**
	 * ?œë¹„?¤ë³„ë¡??ì—…?? parameterë¥?ì¶”ê??˜ì—¬ URL???ì„±?˜ëŠ” ?¨ìˆ˜	 
	 * nhn.husky.SE2M_AttachQuickPhoto.prototype.makePopupURLë¡???–´?¨ì„œ ?¬ìš©?˜ì‹œë©???
	 */
	makePopupURL : function(){
		var sPopupUrl = "./sample/photo_uploader/photo_uploader.html";
		
		return sPopupUrl;
	},
	
	/**
	 * ?ì—…?ì„œ ?¸ì¶œ?˜ëŠ” ë©”ì„¸ì§€.
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

			this.oApp.exec("PASTE_HTML", [sContents]); // ?„ì¦ ì²¨ë? ?Œì¼ ë¶€ë¶??•ì¸
		}catch(e){
			// upload??errorë°œìƒ???€?´ì„œ skip??
			return false;
		}
	},

	/**
	 * @use ?¼ë°˜ ?¬í†  tag ?ì„±
	 */
	_getPhotoTag : function(htPhotoInfo){
		// id?€ class???¸ë„¤?¼ê³¼ ?°ê???ë§ìŠµ?ˆë‹¤. ?˜ì •???¸ë„¤???ì—­??Test
		var sTag = '<img src="{=sOriginalImageURL}" alt="{=sName}" >';
		if(htPhotoInfo.bNewLine){
			sTag += '<br style="clear:both;">';
		}
		sTag = jindo.$Template(sTag).process(htPhotoInfo);
		
		return sTag;
	}
});