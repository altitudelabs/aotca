!function(t){var e=document.createElement("div"),a=e.getElementsByTagName("i"),l=t(document.documentElement);e.innerHTML="<!--[if lte IE 8]><i></i><![endif]-->",a[0]&&l.addClass("ie-lte8"),"querySelector"in document&&(!window.blackberry||window.WebKitPoint)&&!window.operamini&&(l.addClass("tablesaw-enhanced"),t(function(){t(document).trigger("enhance.tablesaw")}))}(jQuery),"undefined"==typeof Tablesaw&&(Tablesaw={i18n:{modes:["Stack","Swipe","Toggle"],columns:'Col<span class="a11y-sm">umn</span>s',columnBtnText:"Columns",columnsDialogError:"No eligible columns.",sort:"Sort"}}),Tablesaw.config||(Tablesaw.config={}),function(t){var e="table",a={toolbar:"tablesaw-bar"},l={create:"tablesawcreate",destroy:"tablesawdestroy",refresh:"tablesawrefresh"},s="stack",i="table[data-tablesaw-mode],table[data-tablesaw-sortable]",n=function(e){if(!e)throw new Error("Tablesaw requires an element.");this.table=e,this.$table=t(e),this.mode=this.$table.attr("data-tablesaw-mode")||s,this.init()};n.prototype.init=function(){this.$table.attr("id")||this.$table.attr("id",e+"-"+Math.round(1e4*Math.random())),this.createToolbar();var t=this._initCells();this.$table.trigger(l.create,[this,t])},n.prototype._initCells=function(){var e,a=this.table.querySelectorAll("thead tr"),l=this;return t(a).each(function(){var s=0;t(this).children().each(function(){var i=parseInt(this.getAttribute("colspan"),10),n=":nth-child("+(s+1)+")";if(e=s+1,i)for(var o=0;i-1>o;o++)s++,n+=", :nth-child("+(s+1)+")";this.cells=l.$table.find("tr").not(t(a).eq(0)).not(this).children(n),s++})}),e},n.prototype.refresh=function(){this._initCells(),this.$table.trigger(l.refresh)},n.prototype.createToolbar=function(){var e=this.$table.prev("."+a.toolbar);e.length||(e=t("<div>").addClass(a.toolbar).insertBefore(this.$table)),this.$toolbar=e,this.mode&&this.$toolbar.addClass("mode-"+this.mode)},n.prototype.destroy=function(){this.$table.prev("."+a.toolbar).each(function(){this.className=this.className.replace(/\bmode\-\w*\b/gi,"")});var s=this.$table.attr("id");t(document).unbind("."+s),t(window).unbind("."+s),this.$table.trigger(l.destroy,[this]),this.$table.removeAttr("data-tablesaw-mode"),this.$table.removeData(e)},t.fn[e]=function(){return this.each(function(){var a=t(this);if(!a.data(e)){var l=new n(this);a.data(e,l)}})},t(document).on("enhance.tablesaw",function(a){t(a.target).find(i)[e]()})}(jQuery),function(t,e,a){var l={stackTable:"tablesaw-stack",cellLabels:"tablesaw-cell-label",cellContentLabels:"tablesaw-cell-content"},s={obj:"tablesaw-stack"},i={labelless:"data-tablesaw-no-labels",hideempty:"data-tablesaw-hide-empty"},n=function(t){this.$table=e(t),this.labelless=this.$table.is("["+i.labelless+"]"),this.hideempty=this.$table.is("["+i.hideempty+"]"),this.labelless||(this.allHeaders=this.$table.find("th")),this.$table.data(s.obj,this)};n.prototype.init=function(t){if(this.$table.addClass(l.stackTable),!this.labelless){var a=e(this.allHeaders),s=this.hideempty;a.each(function(){var a=e(this),n=e(this.cells).filter(function(){return!(e(this).parent().is("["+i.labelless+"]")||s&&e(this).is(":empty"))}),o=n.not(this).filter("thead th").length&&" tablesaw-cell-label-top",r=a.find(".tablesaw-sortable-btn"),b=r.length?r.html():a.html();if(""!==b)if(o){var h=parseInt(e(this).attr("colspan"),10),c="";h&&(c="td:nth-child("+h+"n + "+t+")"),n.filter(c).prepend("<b class='"+l.cellLabels+o+"'>"+b+"</b>")}else n.wrapInner("<span class='"+l.cellContentLabels+"'></span>"),n.prepend("<b class='"+l.cellLabels+"'>"+b+"</b>")})}},n.prototype.destroy=function(){this.$table.removeClass(l.stackTable),this.$table.find("."+l.cellLabels).remove(),this.$table.find("."+l.cellContentLabels).each(function(){e(this).replaceWith(this.childNodes)})},e(document).on("tablesawcreate",function(t,e,a){if("stack"===e.mode){var l=new n(e.table);l.init(a)}}),e(document).on("tablesawdestroy",function(t,a){"stack"===a.mode&&e(a.table).data(s.obj).destroy()})}(this,jQuery);