/*jquery.events.touch - 1.4.5*/
(function(e,t,n){typeof define=="function"&&define.amd?define(["jquery"],function(r){return n(r,e,t),r.mobile}):n(e.jQuery,e,t)})(this,document,function(e,t,n,r){(function(e,t,n,r){function T(e){while(e&&typeof e.originalEvent!="undefined")e=e.originalEvent;return e}function N(t,n){var i=t.type,s,o,a,l,c,h,p,d,v;t=e.Event(t),t.type=n,s=t.originalEvent,o=e.event.props,i.search(/^(mouse|click)/)>-1&&(o=f);if(s)for(p=o.length,l;p;)l=o[--p],t[l]=s[l];i.search(/mouse(down|up)|click/)>-1&&!t.which&&(t.which=1);if(i.search(/^touch/)!==-1){a=T(s),i=a.touches,c=a.changedTouches,h=i&&i.length?i[0]:c&&c.length?c[0]:r;if(h)for(d=0,v=u.length;d<v;d++)l=u[d],t[l]=h[l]}return t}function C(t){var n={},r,s;while(t){r=e.data(t,i);for(s in r)r[s]&&(n[s]=n.hasVirtualBinding=!0);t=t.parentNode}return n}function k(t,n){var r;while(t){r=e.data(t,i);if(r&&(!n||r[n]))return t;t=t.parentNode}return null}function L(){g=!1}function A(){g=!0}function O(){E=0,v.length=0,m=!1,A()}function M(){L()}function _(){D(),c=setTimeout(function(){c=0,O()},e.vmouse.resetTimerDuration)}function D(){c&&(clearTimeout(c),c=0)}function P(t,n,r){var i;if(r&&r[t]||!r&&k(n.target,t))i=N(n,t),e(n.target).trigger(i);return i}function H(t){var n=e.data(t.target,s),r;!m&&(!E||E!==n)&&(r=P("v"+t.type,t),r&&(r.isDefaultPrevented()&&t.preventDefault(),r.isPropagationStopped()&&t.stopPropagation(),r.isImmediatePropagationStopped()&&t.stopImmediatePropagation()))}function B(t){var n=T(t).touches,r,i,o;n&&n.length===1&&(r=t.target,i=C(r),i.hasVirtualBinding&&(E=w++,e.data(r,s,E),D(),M(),d=!1,o=T(t).touches[0],h=o.pageX,p=o.pageY,P("vmouseover",t,i),P("vmousedown",t,i)))}function j(e){if(g)return;d||P("vmousecancel",e,C(e.target)),d=!0,_()}function F(t){if(g)return;var n=T(t).touches[0],r=d,i=e.vmouse.moveDistanceThreshold,s=C(t.target);d=d||Math.abs(n.pageX-h)>i||Math.abs(n.pageY-p)>i,d&&!r&&P("vmousecancel",t,s),P("vmousemove",t,s),_()}function I(e){if(g)return;A();var t=C(e.target),n,r;P("vmouseup",e,t),d||(n=P("vclick",e,t),n&&n.isDefaultPrevented()&&(r=T(e).changedTouches[0],v.push({touchID:E,x:r.clientX,y:r.clientY}),m=!0)),P("vmouseout",e,t),d=!1,_()}function q(t){var n=e.data(t,i),r;if(n)for(r in n)if(n[r])return!0;return!1}function R(){}function U(t){var n=t.substr(1);return{setup:function(){q(this)||e.data(this,i,{});var r=e.data(this,i);r[t]=!0,l[t]=(l[t]||0)+1,l[t]===1&&b.bind(n,H),e(this).bind(n,R),y&&(l.touchstart=(l.touchstart||0)+1,l.touchstart===1&&b.bind("touchstart",B).bind("touchend",I).bind("touchmove",F).bind("scroll",j))},teardown:function(){--l[t],l[t]||b.unbind(n,H),y&&(--l.touchstart,l.touchstart||b.unbind("touchstart",B).unbind("touchmove",F).unbind("touchend",I).unbind("scroll",j));var r=e(this),s=e.data(this,i);s&&(s[t]=!1),r.unbind(n,R),q(this)||r.removeData(i)}}}var i="virtualMouseBindings",s="virtualTouchID",o="vmouseover vmousedown vmousemove vmouseup vclick vmouseout vmousecancel".split(" "),u="clientX clientY pageX pageY screenX screenY".split(" "),a=e.event.mouseHooks?e.event.mouseHooks.props:[],f=e.event.props.concat(a),l={},c=0,h=0,p=0,d=!1,v=[],m=!1,g=!1,y="addEventListener"in n,b=e(n),w=1,E=0,S,x;e.vmouse={moveDistanceThreshold:10,clickDistanceThreshold:10,resetTimerDuration:1500};for(x=0;x<o.length;x++)e.event.special[o[x]]=U(o[x]);y&&n.addEventListener("click",function(t){var n=v.length,r=t.target,i,o,u,a,f,l;if(n){i=t.clientX,o=t.clientY,S=e.vmouse.clickDistanceThreshold,u=r;while(u){for(a=0;a<n;a++){f=v[a],l=0;if(u===r&&Math.abs(f.x-i)<S&&Math.abs(f.y-o)<S||e.data(u,s)===f.touchID){t.preventDefault(),t.stopPropagation();return}}u=u.parentNode}}},!0)})(e,t,n),function(e){e.mobile={}}(e),function(e,t){var r={touch:"ontouchend"in n};e.mobile.support=e.mobile.support||{},e.extend(e.support,r),e.extend(e.mobile.support,r)}(e),function(e,t,r){function l(t,n,i,s){var o=i.type;i.type=n,s?e.event.trigger(i,r,t):e.event.dispatch.call(t,i),i.type=o}var i=e(n),s=e.mobile.support.touch,o="touchmove scroll",u=s?"touchstart":"mousedown",a=s?"touchend":"mouseup",f=s?"touchmove":"mousemove";e.each("touchstart touchmove touchend tap taphold swipe swipeleft swiperight scrollstart scrollstop".split(" "),function(t,n){e.fn[n]=function(e){return e?this.bind(n,e):this.trigger(n)},e.attrFn&&(e.attrFn[n]=!0)}),e.event.special.scrollstart={enabled:!0,setup:function(){function s(e,n){r=n,l(t,r?"scrollstart":"scrollstop",e)}var t=this,n=e(t),r,i;n.bind(o,function(t){if(!e.event.special.scrollstart.enabled)return;r||s(t,!0),clearTimeout(i),i=setTimeout(function(){s(t,!1)},50)})},teardown:function(){e(this).unbind(o)}},e.event.special.tap={tapholdThreshold:750,emitTapOnTaphold:!0,setup:function(){var t=this,n=e(t),r=!1;n.bind("vmousedown",function(s){function a(){clearTimeout(u)}function f(){a(),n.unbind("vclick",c).unbind("vmouseup",a),i.unbind("vmousecancel",f)}function c(e){f(),!r&&o===e.target?l(t,"tap",e):r&&e.preventDefault()}r=!1;if(s.which&&s.which!==1)return!1;var o=s.target,u;n.bind("vmouseup",a).bind("vclick",c),i.bind("vmousecancel",f),u=setTimeout(function(){e.event.special.tap.emitTapOnTaphold||(r=!0),l(t,"taphold",e.Event("taphold",{target:o}))},e.event.special.tap.tapholdThreshold)})},teardown:function(){e(this).unbind("vmousedown").unbind("vclick").unbind("vmouseup"),i.unbind("vmousecancel")}},e.event.special.swipe={scrollSupressionThreshold:30,durationThreshold:1e3,horizontalDistanceThreshold:30,verticalDistanceThreshold:30,getLocation:function(e){var n=t.pageXOffset,r=t.pageYOffset,i=e.clientX,s=e.clientY;if(e.pageY===0&&Math.floor(s)>Math.floor(e.pageY)||e.pageX===0&&Math.floor(i)>Math.floor(e.pageX))i-=n,s-=r;else if(s<e.pageY-r||i<e.pageX-n)i=e.pageX-n,s=e.pageY-r;return{x:i,y:s}},start:function(t){var n=t.originalEvent.touches?t.originalEvent.touches[0]:t,r=e.event.special.swipe.getLocation(n);return{time:(new Date).getTime(),coords:[r.x,r.y],origin:e(t.target)}},stop:function(t){var n=t.originalEvent.touches?t.originalEvent.touches[0]:t,r=e.event.special.swipe.getLocation(n);return{time:(new Date).getTime(),coords:[r.x,r.y]}},handleSwipe:function(t,n,r,i){if(n.time-t.time<e.event.special.swipe.durationThreshold&&Math.abs(t.coords[0]-n.coords[0])>e.event.special.swipe.horizontalDistanceThreshold&&Math.abs(t.coords[1]-n.coords[1])<e.event.special.swipe.verticalDistanceThreshold){var s=t.coords[0]>n.coords[0]?"swipeleft":"swiperight";return l(r,"swipe",e.Event("swipe",{target:i,swipestart:t,swipestop:n}),!0),l(r,s,e.Event(s,{target:i,swipestart:t,swipestop:n}),!0),!0}return!1},eventInProgress:!1,setup:function(){var t,n=this,r=e(n),s={};t=e.data(this,"mobile-events"),t||(t={length:0},e.data(this,"mobile-events",t)),t.length++,t.swipe=s,s.start=function(t){if(e.event.special.swipe.eventInProgress)return;e.event.special.swipe.eventInProgress=!0;var r,o=e.event.special.swipe.start(t),u=t.target,l=!1;s.move=function(t){if(!o||t.isDefaultPrevented())return;r=e.event.special.swipe.stop(t),l||(l=e.event.special.swipe.handleSwipe(o,r,n,u),l&&(e.event.special.swipe.eventInProgress=!1)),Math.abs(o.coords[0]-r.coords[0])>e.event.special.swipe.scrollSupressionThreshold&&t.preventDefault()},s.stop=function(){l=!0,e.event.special.swipe.eventInProgress=!1,i.off(f,s.move),s.move=null},i.on(f,s.move).one(a,s.stop)},r.on(u,s.start)},teardown:function(){var t,n;t=e.data(this,"mobile-events"),t&&(n=t.swipe,delete t.swipe,t.length--,t.length===0&&e.removeData(this,"mobile-events")),n&&(n.start&&e(this).off(u,n.start),n.move&&i.off(f,n.move),n.stop&&i.off(a,n.stop))}},e.each({scrollstop:"scrollstart",taphold:"tap",swipeleft:"swipe.left",swiperight:"swipe.right"},function(t,n){e.event.special[t]={setup:function(){e(this).bind(n,e.noop)},teardown:function(){e(this).unbind(n)}}})}(e,this)});
/*lightbox - 2.1.1*/
!function(t){window.lightcase={cache:{},support:{},labels:{errorMessage:"Source could not be found...","sequenceInfo.of":" of ",close:"Close","navigator.prev":"Prev","navigator.next":"Next","navigator.play":"Play","navigator.pause":"Pause"},init:function(e){return this.each(function(){t(this).unbind("click").click(function(i){i.preventDefault(),t(this).lightcase("start",e)})})},start:function(e){lightcase.settings=t.extend(!0,{idPrefix:"lightcase-",classPrefix:"lightcase-",transition:"elastic",transitionIn:null,transitionOut:null,cssTransitions:!0,speedIn:250,speedOut:250,maxWidth:800,maxHeight:500,forceWidth:!1,forceHeight:!1,liveResize:!0,fullScreenModeForMobile:!0,mobileMatchExpression:/(iphone|ipod|ipad|android|blackberry|symbian)/,disableShrink:!1,shrinkFactor:.75,overlayOpacity:.9,slideshow:!1,timeout:5e3,swipe:!0,useKeys:!0,navigateEndless:!0,closeOnOverlayClick:!0,title:null,caption:null,showTitle:!0,showCaption:!0,showSequenceInfo:!0,inline:{width:"auto",height:"auto"},ajax:{width:"auto",height:"auto",type:"get",dataType:"html",data:{}},iframe:{width:800,height:500,frameborder:0},flash:{width:400,height:205,wmode:"transparent"},video:{width:400,height:225,poster:"",preload:"auto",controls:!0,autobuffer:!0,autoplay:!0,loop:!1},attr:"data-rel",href:null,type:null,typeMapping:{image:"jpg,jpeg,gif,png,bmp",flash:"swf",video:"mp4,mov,ogv,ogg,webm",iframe:"html,php",ajax:"json,txt",inline:"#"},errorMessage:function(){return'<p class="'+lightcase.settings.classPrefix+'error">'+lightcase.labels.errorMessage+"</p>"},markup:function(){t("body").append($overlay=t('<div id="'+lightcase.settings.idPrefix+'overlay"></div>'),$loading=t('<div id="'+lightcase.settings.idPrefix+'loading" class="'+lightcase.settings.classPrefix+'icon-spin"></div>'),$case=t('<div id="'+lightcase.settings.idPrefix+'case" aria-hidden="true" role="dialog"></div>')),$case.after($nav=t('<div id="'+lightcase.settings.idPrefix+'nav"></div>')),$nav.append($close=t('<a href="#" class="'+lightcase.settings.classPrefix+'icon-close"><span>'+lightcase.labels.close+"</span></a>"),$prev=t('<a href="#" class="'+lightcase.settings.classPrefix+'icon-prev"><span>'+lightcase.labels["navigator.prev"]+"</span></a>").hide(),$next=t('<a href="#" class="'+lightcase.settings.classPrefix+'icon-next"><span>'+lightcase.labels["navigator.next"]+"</span></a>").hide(),$play=t('<a href="#" class="'+lightcase.settings.classPrefix+'icon-play"><span>'+lightcase.labels["navigator.play"]+"</span></a>").hide(),$pause=t('<a href="#" class="'+lightcase.settings.classPrefix+'icon-pause"><span>'+lightcase.labels["navigator.pause"]+"</span></a>").hide()),$case.append($content=t('<div class="'+lightcase.settings.classPrefix+'content"></div>'),$info=t('<div class="'+lightcase.settings.classPrefix+'info"></div>')),$content.append($contentInner=t('<div class="'+lightcase.settings.classPrefix+'contentInner"></div>')),$info.append($sequenceInfo=t('<div class="'+lightcase.settings.classPrefix+'sequenceInfo"></div>'),$title=t('<h4 class="'+lightcase.settings.classPrefix+'title"></h4>'),$caption=t('<p class="'+lightcase.settings.classPrefix+'caption"></p>'))},onInit:{},onStart:{},onFinish:{},onClose:{},onCleanup:{}},e),lightcase.callHooks(lightcase.settings.onInit),lightcase.objectData=lightcase.getObjectData(this),lightcase.cacheScrollPosition(),lightcase.watchScrollInteraction(),lightcase.addElements(),lightcase.lightcaseOpen(),lightcase.dimensions=lightcase.getDimensions()},getObjectData:function(e){var i={$link:e,title:lightcase.settings.title||e.attr("title"),caption:lightcase.settings.caption||e.children("img").attr("alt"),url:lightcase.verifyDataUrl(lightcase.settings.href||e.attr("data-href")||e.attr("href")),requestType:lightcase.settings.ajax.type,requestData:lightcase.settings.ajax.data,requestDataType:lightcase.settings.ajax.dataType,rel:e.attr(lightcase.settings.attr),type:lightcase.settings.type||lightcase.verifyDataType(e.attr("data-href")||e.attr("href")),isPartOfSequence:lightcase.isPartOfSequence(e.attr(lightcase.settings.attr),":"),isPartOfSequenceWithSlideshow:lightcase.isPartOfSequence(e.attr(lightcase.settings.attr),":slideshow"),currentIndex:t("["+lightcase.settings.attr+'="'+e.attr(lightcase.settings.attr)+'"]').index(e),sequenceLength:t("["+lightcase.settings.attr+'="'+e.attr(lightcase.settings.attr)+'"]').length};return i.sequenceInfo=i.currentIndex+1+lightcase.labels["sequenceInfo.of"]+i.sequenceLength,i},isPartOfSequence:function(e,i){var s=t("["+lightcase.settings.attr+'="'+e+'"]'),a=new RegExp(i);return a.test(e)&&s.length>1?!0:!1},isSlideshowEnabled:function(){return!lightcase.objectData.isPartOfSequence||lightcase.settings.slideshow!==!0&&lightcase.objectData.isPartOfSequenceWithSlideshow!==!0?!1:!0},loadContent:function(){lightcase.cache.originalObject&&lightcase.restoreObject(),lightcase.createObject()},createObject:function(){var e;switch(lightcase.objectData.type){case"image":e=t(new Image),e.attr({src:lightcase.objectData.url,alt:lightcase.objectData.title});break;case"inline":e=t('<div class="'+lightcase.settings.classPrefix+'inlineWrap"></div>'),e.html(lightcase.cloneObject(t(lightcase.objectData.url))),t.each(lightcase.settings.inline,function(t,i){e.attr("data-"+t,i)});break;case"ajax":e=t('<div class="'+lightcase.settings.classPrefix+'inlineWrap"></div>'),t.each(lightcase.settings.ajax,function(t,i){"data"!==t&&e.attr("data-"+t,i)});break;case"flash":e=t('<embed src="'+lightcase.objectData.url+'" type="application/x-shockwave-flash"></embed>'),t.each(lightcase.settings.flash,function(t,i){e.attr(t,i)});break;case"video":e=t("<video></video>"),e.attr("src",lightcase.objectData.url),t.each(lightcase.settings.video,function(t,i){e.attr(t,i)});break;default:e=t("<iframe></iframe>"),e.attr({src:lightcase.objectData.url}),t.each(lightcase.settings.iframe,function(t,i){e.attr(t,i)})}lightcase.addObject(e),lightcase.loadObject(e)},addObject:function(t){$contentInner.html(t),lightcase.loading("start"),lightcase.callHooks(lightcase.settings.onStart),lightcase.settings.showSequenceInfo===!0&&lightcase.objectData.isPartOfSequence?($sequenceInfo.html(lightcase.objectData.sequenceInfo),$sequenceInfo.show()):($sequenceInfo.empty(),$sequenceInfo.hide()),lightcase.settings.showTitle===!0&&void 0!==lightcase.objectData.title&&""!==lightcase.objectData.title?($title.html(lightcase.objectData.title),$title.show()):($title.empty(),$title.hide()),lightcase.settings.showCaption===!0&&void 0!==lightcase.objectData.caption&&""!==lightcase.objectData.caption?($caption.html(lightcase.objectData.caption),$caption.show()):($caption.empty(),$caption.hide())},loadObject:function(e){switch(lightcase.objectData.type){case"inline":t(lightcase.objectData.url)?lightcase.showContent(e):lightcase.error();break;case"ajax":t.ajax(t.extend({},lightcase.settings.ajax,{url:lightcase.objectData.url,type:lightcase.objectData.requestType,dataType:lightcase.objectData.requestDataType,data:lightcase.objectData.requestData,success:function(t){"json"===lightcase.objectData.requestDataType?lightcase.objectData.data=t:e.html(t),lightcase.showContent(e)},error:function(){lightcase.error()}}));break;case"flash":lightcase.showContent(e);break;case"video":"function"==typeof e.get(0).canPlayType||0===$case.find("video").length?lightcase.showContent(e):lightcase.error();break;default:lightcase.objectData.url?(e.load(function(){lightcase.showContent(e)}),e.error(function(){lightcase.error()})):lightcase.error()}},error:function(){lightcase.objectData.type="error";var e=t('<div class="'+lightcase.settings.classPrefix+'inlineWrap"></div>');e.html(lightcase.settings.errorMessage),$contentInner.html(e),lightcase.showContent($contentInner)},calculateDimensions:function(t){lightcase.cleanupDimensions();var e={objectWidth:t.attr(t.attr("width")?"width":"data-width"),objectHeight:t.attr(t.attr("height")?"height":"data-height")};if(!lightcase.settings.disableShrink)switch(e.maxWidth=parseInt(lightcase.dimensions.windowWidth*lightcase.settings.shrinkFactor),e.maxHeight=parseInt(lightcase.dimensions.windowHeight*lightcase.settings.shrinkFactor),e.maxWidth>lightcase.settings.maxWidth&&(e.maxWidth=lightcase.settings.maxWidth),e.maxHeight>lightcase.settings.maxHeight&&(e.maxHeight=lightcase.settings.maxHeight),e.differenceWidthAsPercent=parseInt(100/e.maxWidth*e.objectWidth),e.differenceHeightAsPercent=parseInt(100/e.maxHeight*e.objectHeight),lightcase.objectData.type){case"image":case"flash":case"video":e.differenceWidthAsPercent>100&&e.differenceWidthAsPercent>e.differenceHeightAsPercent&&(e.objectWidth=e.maxWidth,e.objectHeight=parseInt(e.objectHeight/e.differenceWidthAsPercent*100)),e.differenceHeightAsPercent>100&&e.differenceHeightAsPercent>e.differenceWidthAsPercent&&(e.objectWidth=parseInt(e.objectWidth/e.differenceHeightAsPercent*100),e.objectHeight=e.maxHeight),e.differenceHeightAsPercent>100&&e.differenceWidthAsPercent<e.differenceHeightAsPercent&&(e.objectWidth=parseInt(e.maxWidth/e.differenceHeightAsPercent*e.differenceWidthAsPercent),e.objectHeight=e.maxHeight);break;case"error":!isNaN(e.objectWidth)&&e.objectWidth>e.maxWidth&&(e.objectWidth=e.maxWidth);break;default:(isNaN(e.objectWidth)||e.objectWidth>e.maxWidth)&&!lightcase.settings.forceWidth&&(e.objectWidth=e.maxWidth),(isNaN(e.objectHeight)&&"auto"!==e.objectHeight||e.objectHeight>e.maxHeight)&&!lightcase.settings.forceHeight&&(e.objectHeight=e.maxHeight)}lightcase.adjustDimensions(t,e)},adjustDimensions:function(t,e){t.css({width:e.objectWidth,height:e.objectHeight,"max-width":t.attr("data-max-width")?t.attr("data-max-width"):e.maxWidth,"max-height":t.attr("data-max-height")?t.attr("data-max-height"):e.maxHeight}),$contentInner.css({width:t.outerWidth(),height:t.outerHeight(),"max-width":"100%"}),$case.css({width:$contentInner.outerWidth()}),$case.css({"margin-top":parseInt(-($case.outerHeight()/2)),"margin-left":parseInt(-($case.outerWidth()/2))})},loading:function(t){"start"===t?($case.addClass(lightcase.settings.classPrefix+"loading"),$loading.show()):"end"===t&&($case.removeClass(lightcase.settings.classPrefix+"loading"),$loading.hide())},getDimensions:function(){return{windowWidth:t(window).innerWidth(),windowHeight:t(window).innerHeight()}},verifyDataUrl:function(t){return t&&void 0!==t&&""!==t?(t.indexOf("#")>-1&&(t=t.split("#"),t="#"+t[t.length-1]),t.toString()):!1},verifyDataType:function(t){var t=lightcase.verifyDataUrl(t),e=lightcase.settings.typeMapping;if(t)for(var i in e)for(var s=e[i].split(","),a=0;a<s.length;a++){var c=s[a].toLowerCase(),n=new RegExp(".("+c+")$","i"),l=t.toLowerCase().split("?")[0].substr(-5);if(n.test(l)===!0)return i;if("inline"===i&&(t.indexOf(c)>-1||!t))return i}return"iframe"},addElements:function(){"undefined"!=typeof $case&&t("#"+$case.attr("id")).length||lightcase.settings.markup()},showContent:function(t){switch($case.attr("data-type",lightcase.objectData.type),lightcase.cache.object=t,lightcase.calculateDimensions(t),lightcase.callHooks(lightcase.settings.onFinish),lightcase.settings.transitionIn){case"scrollTop":case"scrollRight":case"scrollBottom":case"scrollLeft":case"scrollHorizontal":case"scrollVertical":lightcase.transition.scroll($case,"in",lightcase.settings.speedIn),lightcase.transition.fade($contentInner,"in",lightcase.settings.speedIn);break;case"elastic":$case.css("opacity")<1&&(lightcase.transition.zoom($case,"in",lightcase.settings.speedIn),lightcase.transition.fade($contentInner,"in",lightcase.settings.speedIn));case"fade":case"fadeInline":lightcase.transition.fade($case,"in",lightcase.settings.speedIn),lightcase.transition.fade($contentInner,"in",lightcase.settings.speedIn);break;default:lightcase.transition.fade($case,"in",0)}lightcase.loading("end"),lightcase.busy=!1},processContent:function(){switch(lightcase.busy=!0,lightcase.settings.transitionOut){case"scrollTop":case"scrollRight":case"scrollBottom":case"scrollLeft":case"scrollVertical":case"scrollHorizontal":$case.is(":hidden")?(lightcase.transition.fade($case,"out",0,0,function(){lightcase.loadContent()}),lightcase.transition.fade($contentInner,"out",0)):lightcase.transition.scroll($case,"out",lightcase.settings.speedOut,function(){lightcase.loadContent()});break;case"fade":$case.is(":hidden")?lightcase.transition.fade($case,"out",0,0,function(){lightcase.loadContent()}):lightcase.transition.fade($case,"out",lightcase.settings.speedOut,0,function(){lightcase.loadContent()});break;case"fadeInline":case"elastic":$case.is(":hidden")?lightcase.transition.fade($case,"out",0,0,function(){lightcase.loadContent()}):lightcase.transition.fade($contentInner,"out",lightcase.settings.speedOut,0,function(){lightcase.loadContent()});break;default:lightcase.transition.fade($case,"out",0,0,function(){lightcase.loadContent()})}},handleEvents:function(){lightcase.unbindEvents(),$nav.children().not($close).hide(),lightcase.isSlideshowEnabled()&&($nav.hasClass(lightcase.settings.classPrefix+"paused")?lightcase.stopTimeout():lightcase.startTimeout()),lightcase.settings.liveResize&&lightcase.watchResizeInteraction(),$close.click(function(t){t.preventDefault(),lightcase.lightcaseClose()}),lightcase.settings.closeOnOverlayClick===!0&&$overlay.css("cursor","pointer").click(function(t){t.preventDefault(),lightcase.lightcaseClose()}),lightcase.settings.useKeys===!0&&lightcase.addKeyEvents(),lightcase.objectData.isPartOfSequence&&($nav.attr("data-ispartofsequence",!0),lightcase.nav=lightcase.setNavigation(),$prev.click(function(t){t.preventDefault(),$prev.unbind("click"),lightcase.cache.action="prev",lightcase.nav.$prevItem.click(),lightcase.isSlideshowEnabled()&&lightcase.stopTimeout()}),$next.click(function(t){t.preventDefault(),$next.unbind("click"),lightcase.cache.action="next",lightcase.nav.$nextItem.click(),lightcase.isSlideshowEnabled()&&lightcase.stopTimeout()}),lightcase.isSlideshowEnabled()&&($play.click(function(t){t.preventDefault(),lightcase.startTimeout()}),$pause.click(function(t){t.preventDefault(),lightcase.stopTimeout()})),lightcase.settings.swipe===!0&&(t.isPlainObject(t.event.special.swipeleft)&&$case.on("swipeleft",function(t){t.preventDefault(),$next.click(),lightcase.isSlideshowEnabled()&&lightcase.stopTimeout()}),t.isPlainObject(t.event.special.swiperight)&&$case.on("swiperight",function(t){t.preventDefault(),$prev.click(),lightcase.isSlideshowEnabled()&&lightcase.stopTimeout()})))},addKeyEvents:function(){t(document).bind("keyup.lightcase",function(t){if(!lightcase.busy)switch(t.keyCode){case 27:$close.click();break;case 37:lightcase.objectData.isPartOfSequence&&$prev.click();break;case 39:lightcase.objectData.isPartOfSequence&&$next.click()}})},startTimeout:function(){$play.hide(),$pause.show(),lightcase.cache.action="next",$nav.removeClass(lightcase.settings.classPrefix+"paused"),lightcase.timeout=setTimeout(function(){lightcase.nav.$nextItem.click()},lightcase.settings.timeout)},stopTimeout:function(){$play.show(),$pause.hide(),$nav.addClass(lightcase.settings.classPrefix+"paused"),clearTimeout(lightcase.timeout)},setNavigation:function(){var e=t("["+lightcase.settings.attr+'="'+lightcase.objectData.rel+'"]'),i=lightcase.objectData.currentIndex,s=i-1,a=i+1,c=lightcase.objectData.sequenceLength-1,n={$prevItem:e.eq(s),$nextItem:e.eq(a)};return i>0?$prev.show():n.$prevItem=e.eq(c),c>=a?$next.show():n.$nextItem=e.eq(0),lightcase.settings.navigateEndless===!0&&($prev.show(),$next.show()),n},cloneObject:function(t){var e=t.clone(),i=t.attr("id");return t.is(":hidden")?(lightcase.cacheObjectData(t),t.attr("id",lightcase.settings.idPrefix+"temp-"+i).empty()):e.removeAttr("id"),e.show()},isMobileDevice:function(){var t=navigator.userAgent.toLowerCase(),e=t.match(lightcase.settings.mobileMatchExpression);return e?!0:!1},isTransitionSupported:function(){var e=t("body").get(0),i=!1,s={transition:"",WebkitTransition:"-webkit-",MozTransition:"-moz-",OTransition:"-o-",MsTransition:"-ms-"};for(var a in s)s.hasOwnProperty(a)&&a in e.style&&(lightcase.support.transition=s[a],i=!0);return i},transition:{fade:function(t,e,i,s,a){var c="in"===e,n={},l=t.css("opacity"),o={},r=s?s:c?1:0;(lightcase.open||!c)&&(n.opacity=l,o.opacity=r,t.css(n).show(),lightcase.support.transitions?(o[lightcase.support.transition+"transition"]=i+"ms ease",setTimeout(function(){t.css(o),setTimeout(function(){t.css(lightcase.support.transition+"transition",""),!a||!lightcase.open&&c||a()},i)},15)):(t.stop(),t.animate(o,i,a)))},scroll:function(t,e,i,s){var a="in"===e,c=a?lightcase.settings.transitionIn:lightcase.settings.transitionOut,n="left",l={},o=a?0:1,r=a?"-50%":"50%",h={},g=a?1:0,d=a?"50%":"-50%";if(lightcase.open||!a){switch(c){case"scrollTop":n="top";break;case"scrollRight":r=a?"150%":"50%",d=a?"50%":"150%";break;case"scrollBottom":n="top",r=a?"150%":"50%",d=a?"50%":"150%";break;case"scrollHorizontal":r=a?"150%":"50%",d=a?"50%":"-50%";break;case"scrollVertical":n="top",r=a?"-50%":"50%",d=a?"50%":"150%"}if("prev"===lightcase.cache.action)switch(c){case"scrollHorizontal":r=a?"-50%":"50%",d=a?"50%":"150%";break;case"scrollVertical":r=a?"150%":"50%",d=a?"50%":"-50%"}l.opacity=o,l[n]=r,h.opacity=g,h[n]=d,t.css(l).show(),lightcase.support.transitions?(h[lightcase.support.transition+"transition"]=i+"ms ease",setTimeout(function(){t.css(h),setTimeout(function(){t.css(lightcase.support.transition+"transition",""),!s||!lightcase.open&&a||s()},i)},15)):(t.stop(),t.animate(h,i,s))}},zoom:function(t,e,i,s){var a="in"===e,c={},n=t.css("opacity"),l=a?"scale(0.75)":"scale(1)",o={},r=a?1:0,h=a?"scale(1)":"scale(0.75)";(lightcase.open||!a)&&(c.opacity=n,c[lightcase.support.transition+"transform"]=l,o.opacity=r,t.css(c).show(),lightcase.support.transitions?(o[lightcase.support.transition+"transform"]=h,o[lightcase.support.transition+"transition"]=i+"ms ease",setTimeout(function(){t.css(o),setTimeout(function(){t.css(lightcase.support.transition+"transform",""),t.css(lightcase.support.transition+"transition",""),!s||!lightcase.open&&a||s()},i)},15)):(t.stop(),t.animate(o,i,s)))}},callHooks:function(e){"object"==typeof e&&t.each(e,function(t,e){"function"==typeof e&&e()})},cacheObjectData:function(e){t.data(e,"cache",{id:e.attr("id"),content:e.html()}),lightcase.cache.originalObject=e},restoreObject:function(){var e=t('[id^="'+lightcase.settings.idPrefix+'temp-"]');e.attr("id",t.data(lightcase.cache.originalObject,"cache").id),e.html(t.data(lightcase.cache.originalObject,"cache").content)},resize:function(){lightcase.open&&(lightcase.isSlideshowEnabled()&&lightcase.stopTimeout(),lightcase.dimensions=lightcase.getDimensions(),lightcase.calculateDimensions(lightcase.cache.object))},cacheScrollPosition:function(){var e=t(window),i=t(document),s={top:e.scrollTop(),left:e.scrollLeft()};lightcase.cache.scrollPosition=lightcase.cache.scrollPosition||{},i.width()>e.width()&&(lightcase.cache.scrollPosition.left=s.left),i.height()>e.height()&&(lightcase.cache.scrollPosition.top=s.top)},watchResizeInteraction:function(){t(window).resize(lightcase.resize)},unwatchResizeInteraction:function(){t(window).off("resize",lightcase.resize)},watchScrollInteraction:function(){t(window).scroll(lightcase.cacheScrollPosition)},unwatchScrollInteraction:function(){t(window).off("scroll",lightcase.cacheScrollPosition)},restoreScrollPosition:function(){t(window).scrollTop(parseInt(lightcase.cache.scrollPosition.top)).scrollLeft(parseInt(lightcase.cache.scrollPosition.left)).resize()},switchToFullScreenMode:function(){lightcase.settings.shrinkFactor=1,lightcase.settings.overlayOpacity=1,t("html").addClass(lightcase.settings.classPrefix+"fullScreenMode")},lightcaseOpen:function(){switch(lightcase.open=!0,lightcase.support.transitions=lightcase.settings.cssTransitions?lightcase.isTransitionSupported():!1,lightcase.support.mobileDevice=lightcase.isMobileDevice(),lightcase.support.mobileDevice&&(t("html").addClass(lightcase.settings.classPrefix+"isMobileDevice"),lightcase.settings.fullScreenModeForMobile&&lightcase.switchToFullScreenMode()),lightcase.settings.transitionIn||(lightcase.settings.transitionIn=lightcase.settings.transition),lightcase.settings.transitionOut||(lightcase.settings.transitionOut=lightcase.settings.transition),lightcase.settings.transitionIn){case"fade":case"fadeInline":case"elastic":case"scrollTop":case"scrollRight":case"scrollBottom":case"scrollLeft":case"scrollVertical":case"scrollHorizontal":$case.is(":hidden")&&($close.css("opacity",0),$overlay.css("opacity",0),$case.css("opacity",0),$contentInner.css("opacity",0)),lightcase.transition.fade($overlay,"in",lightcase.settings.speedIn,lightcase.settings.overlayOpacity,function(){lightcase.transition.fade($close,"in",lightcase.settings.speedIn),lightcase.handleEvents(),lightcase.processContent()});break;default:lightcase.transition.fade($overlay,"in",0,lightcase.settings.overlayOpacity,function(){lightcase.transition.fade($close,"in",0),lightcase.handleEvents(),lightcase.processContent()})}t("html").addClass(lightcase.settings.classPrefix+"open"),$case.attr("aria-hidden","false")},lightcaseClose:function(){switch(lightcase.open=!1,lightcase.isSlideshowEnabled()&&(lightcase.stopTimeout(),$nav.removeClass(lightcase.settings.classPrefix+"paused")),$loading.hide(),lightcase.unbindEvents(),lightcase.unwatchResizeInteraction(),lightcase.unwatchScrollInteraction(),t("html").removeClass(lightcase.settings.classPrefix+"open"),$case.attr("aria-hidden","true"),$nav.children().hide(),lightcase.restoreScrollPosition(),lightcase.callHooks(lightcase.settings.onClose),lightcase.settings.transitionOut){case"fade":case"fadeInline":case"scrollTop":case"scrollRight":case"scrollBottom":case"scrollLeft":case"scrollHorizontal":case"scrollVertical":lightcase.transition.fade($case,"out",lightcase.settings.speedOut,0,function(){lightcase.transition.fade($overlay,"out",lightcase.settings.speedOut,0,function(){lightcase.cleanup()})});break;case"elastic":lightcase.transition.zoom($case,"out",lightcase.settings.speedOut,function(){lightcase.transition.fade($overlay,"out",lightcase.settings.speedOut,0,function(){lightcase.cleanup()})});break;default:lightcase.cleanup()}},unbindEvents:function(){$overlay.unbind("click"),t(document).unbind("keyup.lightcase"),$case.unbind("swipeleft").unbind("swiperight"),$nav.children("a").unbind("click"),$close.unbind("click")},cleanupDimensions:function(){var t=$contentInner.css("opacity");$case.css({width:"",height:"",top:"",left:"","margin-top":"","margin-left":""}),$contentInner.removeAttr("style").css("opacity",t),$contentInner.children().removeAttr("style")},cleanup:function(){lightcase.cleanupDimensions(),$loading.hide(),$overlay.hide(),$case.hide(),$nav.children().hide(),$case.removeAttr("data-type"),$nav.removeAttr("data-ispartofsequence"),$contentInner.empty().hide(),$info.children().empty(),lightcase.cache.originalObject&&lightcase.restoreObject(),lightcase.callHooks(lightcase.settings.onCleanup),lightcase.cache={}}},t.fn.lightcase=function(e){return lightcase[e]?lightcase[e].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof e&&e?void t.error("Method "+e+" does not exist on jQuery.lightcase"):lightcase.init.apply(this,arguments)}}(jQuery);                                                                                                                                                                                                              