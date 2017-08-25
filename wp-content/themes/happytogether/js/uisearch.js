/**
 * uisearch.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
;( function( window ) {
	
	'use strict';
	
	// EventListener | @jon_neal | //github.com/jonathantneal/EventListener
	!window.addEventListener && window.Element && (function () {
	   function addToPrototype(name, method) {
		  Window.prototype[name] = HTMLDocument.prototype[name] = Element.prototype[name] = method;
	   }
	 
	   var registry = [];
	 
	   addToPrototype("addEventListener", function (type, listener) {
		  var target = this;
	 
		  registry.unshift({
			 __listener: function (event) {
				event.currentTarget = target;
				event.pageX = event.clientX + document.documentElement.scrollLeft;
				event.pageY = event.clientY + document.documentElement.scrollTop;
				event.preventDefault = function () { event.returnValue = false };
				event.relatedTarget = event.fromElement || null;
				event.stopPropagation = function () { event.cancelBubble = true };
				event.relatedTarget = event.fromElement || null;
				event.target = event.srcElement || target;
				event.timeStamp = +new Date;
	 
				listener.call(target, event);
			 },
			 listener: listener,
			 target: target,
			 type: type
		  });
	 
		  this.attachEvent("on" + type, registry[0].__listener);
	   });
	 
	   addToPrototype("removeEventListener", function (type, listener) {
		  for (var index = 0, length = registry.length; index < length; ++index) {
			 if (registry[index].target == this && registry[index].type == type && registry[index].listener == listener) {
				return this.detachEvent("on" + type, registry.splice(index, 1)[0].__listener);
			 }
		  }
	   });
	 
	   addToPrototype("dispatchEvent", function (eventObject) {
		  try {
			 return this.fireEvent("on" + eventObject.type, eventObject);
		  } catch (error) {
			 for (var index = 0, length = registry.length; index < length; ++index) {
				if (registry[index].target == this && registry[index].type == eventObject.type) {
				   registry[index].call(this, eventObject);
				}
			 }
		  }
	   });
	})();

	// http://stackoverflow.com/a/11381730/989439
	function mobilecheck() {
		var check = false;
		(function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
		return check;
	}
	
	// http://www.jonathantneal.com/blog/polyfills-and-prototypes/
	!String.prototype.trim && (String.prototype.trim = function() {
		return this.replace(/^\s+|\s+$/g, '');
	});

	function UISearch( el, options ) {	
		this.el = el;
		this.inputEl = el.querySelector( 'form > input.sb-search-input' );
		this._initEvents();
	}

	UISearch.prototype = {
		_initEvents : function() {
			var self = this,
				initSearchFn = function( ev ) {
					ev.stopPropagation();
					// trim its value
					self.inputEl.value = self.inputEl.value.trim();
					
					if( !classie.has( self.el, 'sb-search-open' ) ) { // open it
						ev.preventDefault();
						self.open();
					}
					else if( classie.has( self.el, 'sb-search-open' ) && /^\s*$/.test( self.inputEl.value ) ) { // close it
						ev.preventDefault();
						self.close();
					}
				}

			this.el.addEventListener( 'click', initSearchFn );
			this.el.addEventListener( 'touchstart', initSearchFn );
			this.inputEl.addEventListener( 'click', function( ev ) { ev.stopPropagation(); });
			this.inputEl.addEventListener( 'touchstart', function( ev ) { ev.stopPropagation(); } );
		},
		open : function() {
			var self = this;
			classie.add( this.el, 'sb-search-open' );
			// focus the input
			if( !mobilecheck() ) {
				this.inputEl.focus();
			}
			// close the search input if body is clicked
			var bodyFn = function( ev ) {
				self.close();
				this.removeEventListener( 'click', bodyFn );
				this.removeEventListener( 'touchstart', bodyFn );
			};
			document.addEventListener( 'click', bodyFn );
			document.addEventListener( 'touchstart', bodyFn );
		},
		close : function() {
			this.inputEl.blur();
			classie.remove( this.el, 'sb-search-open' );
		}
	}

	// add to global namespace
	window.UISearch = UISearch;

} )( window );
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJ1aXNlYXJjaC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIHVpc2VhcmNoLmpzIHYxLjAuMFxuICogaHR0cDovL3d3dy5jb2Ryb3BzLmNvbVxuICpcbiAqIExpY2Vuc2VkIHVuZGVyIHRoZSBNSVQgbGljZW5zZS5cbiAqIGh0dHA6Ly93d3cub3BlbnNvdXJjZS5vcmcvbGljZW5zZXMvbWl0LWxpY2Vuc2UucGhwXG4gKiBcbiAqIENvcHlyaWdodCAyMDEzLCBDb2Ryb3BzXG4gKiBodHRwOi8vd3d3LmNvZHJvcHMuY29tXG4gKi9cbjsoIGZ1bmN0aW9uKCB3aW5kb3cgKSB7XG5cdFxuXHQndXNlIHN0cmljdCc7XG5cdFxuXHQvLyBFdmVudExpc3RlbmVyIHwgQGpvbl9uZWFsIHwgLy9naXRodWIuY29tL2pvbmF0aGFudG5lYWwvRXZlbnRMaXN0ZW5lclxuXHQhd2luZG93LmFkZEV2ZW50TGlzdGVuZXIgJiYgd2luZG93LkVsZW1lbnQgJiYgKGZ1bmN0aW9uICgpIHtcblx0ICAgZnVuY3Rpb24gYWRkVG9Qcm90b3R5cGUobmFtZSwgbWV0aG9kKSB7XG5cdFx0ICBXaW5kb3cucHJvdG90eXBlW25hbWVdID0gSFRNTERvY3VtZW50LnByb3RvdHlwZVtuYW1lXSA9IEVsZW1lbnQucHJvdG90eXBlW25hbWVdID0gbWV0aG9kO1xuXHQgICB9XG5cdCBcblx0ICAgdmFyIHJlZ2lzdHJ5ID0gW107XG5cdCBcblx0ICAgYWRkVG9Qcm90b3R5cGUoXCJhZGRFdmVudExpc3RlbmVyXCIsIGZ1bmN0aW9uICh0eXBlLCBsaXN0ZW5lcikge1xuXHRcdCAgdmFyIHRhcmdldCA9IHRoaXM7XG5cdCBcblx0XHQgIHJlZ2lzdHJ5LnVuc2hpZnQoe1xuXHRcdFx0IF9fbGlzdGVuZXI6IGZ1bmN0aW9uIChldmVudCkge1xuXHRcdFx0XHRldmVudC5jdXJyZW50VGFyZ2V0ID0gdGFyZ2V0O1xuXHRcdFx0XHRldmVudC5wYWdlWCA9IGV2ZW50LmNsaWVudFggKyBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsTGVmdDtcblx0XHRcdFx0ZXZlbnQucGFnZVkgPSBldmVudC5jbGllbnRZICsgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcDtcblx0XHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQgPSBmdW5jdGlvbiAoKSB7IGV2ZW50LnJldHVyblZhbHVlID0gZmFsc2UgfTtcblx0XHRcdFx0ZXZlbnQucmVsYXRlZFRhcmdldCA9IGV2ZW50LmZyb21FbGVtZW50IHx8IG51bGw7XG5cdFx0XHRcdGV2ZW50LnN0b3BQcm9wYWdhdGlvbiA9IGZ1bmN0aW9uICgpIHsgZXZlbnQuY2FuY2VsQnViYmxlID0gdHJ1ZSB9O1xuXHRcdFx0XHRldmVudC5yZWxhdGVkVGFyZ2V0ID0gZXZlbnQuZnJvbUVsZW1lbnQgfHwgbnVsbDtcblx0XHRcdFx0ZXZlbnQudGFyZ2V0ID0gZXZlbnQuc3JjRWxlbWVudCB8fCB0YXJnZXQ7XG5cdFx0XHRcdGV2ZW50LnRpbWVTdGFtcCA9ICtuZXcgRGF0ZTtcblx0IFxuXHRcdFx0XHRsaXN0ZW5lci5jYWxsKHRhcmdldCwgZXZlbnQpO1xuXHRcdFx0IH0sXG5cdFx0XHQgbGlzdGVuZXI6IGxpc3RlbmVyLFxuXHRcdFx0IHRhcmdldDogdGFyZ2V0LFxuXHRcdFx0IHR5cGU6IHR5cGVcblx0XHQgIH0pO1xuXHQgXG5cdFx0ICB0aGlzLmF0dGFjaEV2ZW50KFwib25cIiArIHR5cGUsIHJlZ2lzdHJ5WzBdLl9fbGlzdGVuZXIpO1xuXHQgICB9KTtcblx0IFxuXHQgICBhZGRUb1Byb3RvdHlwZShcInJlbW92ZUV2ZW50TGlzdGVuZXJcIiwgZnVuY3Rpb24gKHR5cGUsIGxpc3RlbmVyKSB7XG5cdFx0ICBmb3IgKHZhciBpbmRleCA9IDAsIGxlbmd0aCA9IHJlZ2lzdHJ5Lmxlbmd0aDsgaW5kZXggPCBsZW5ndGg7ICsraW5kZXgpIHtcblx0XHRcdCBpZiAocmVnaXN0cnlbaW5kZXhdLnRhcmdldCA9PSB0aGlzICYmIHJlZ2lzdHJ5W2luZGV4XS50eXBlID09IHR5cGUgJiYgcmVnaXN0cnlbaW5kZXhdLmxpc3RlbmVyID09IGxpc3RlbmVyKSB7XG5cdFx0XHRcdHJldHVybiB0aGlzLmRldGFjaEV2ZW50KFwib25cIiArIHR5cGUsIHJlZ2lzdHJ5LnNwbGljZShpbmRleCwgMSlbMF0uX19saXN0ZW5lcik7XG5cdFx0XHQgfVxuXHRcdCAgfVxuXHQgICB9KTtcblx0IFxuXHQgICBhZGRUb1Byb3RvdHlwZShcImRpc3BhdGNoRXZlbnRcIiwgZnVuY3Rpb24gKGV2ZW50T2JqZWN0KSB7XG5cdFx0ICB0cnkge1xuXHRcdFx0IHJldHVybiB0aGlzLmZpcmVFdmVudChcIm9uXCIgKyBldmVudE9iamVjdC50eXBlLCBldmVudE9iamVjdCk7XG5cdFx0ICB9IGNhdGNoIChlcnJvcikge1xuXHRcdFx0IGZvciAodmFyIGluZGV4ID0gMCwgbGVuZ3RoID0gcmVnaXN0cnkubGVuZ3RoOyBpbmRleCA8IGxlbmd0aDsgKytpbmRleCkge1xuXHRcdFx0XHRpZiAocmVnaXN0cnlbaW5kZXhdLnRhcmdldCA9PSB0aGlzICYmIHJlZ2lzdHJ5W2luZGV4XS50eXBlID09IGV2ZW50T2JqZWN0LnR5cGUpIHtcblx0XHRcdFx0ICAgcmVnaXN0cnlbaW5kZXhdLmNhbGwodGhpcywgZXZlbnRPYmplY3QpO1xuXHRcdFx0XHR9XG5cdFx0XHQgfVxuXHRcdCAgfVxuXHQgICB9KTtcblx0fSkoKTtcblxuXHQvLyBodHRwOi8vc3RhY2tvdmVyZmxvdy5jb20vYS8xMTM4MTczMC85ODk0Mzlcblx0ZnVuY3Rpb24gbW9iaWxlY2hlY2soKSB7XG5cdFx0dmFyIGNoZWNrID0gZmFsc2U7XG5cdFx0KGZ1bmN0aW9uKGEpe2lmKC8oYW5kcm9pZHxpcGFkfHBsYXlib29rfHNpbGt8YmJcXGQrfG1lZWdvKS4rbW9iaWxlfGF2YW50Z298YmFkYVxcL3xibGFja2JlcnJ5fGJsYXplcnxjb21wYWx8ZWxhaW5lfGZlbm5lY3xoaXB0b3B8aWVtb2JpbGV8aXAoaG9uZXxvZCl8aXJpc3xraW5kbGV8bGdlIHxtYWVtb3xtaWRwfG1tcHxuZXRmcm9udHxvcGVyYSBtKG9ifGluKWl8cGFsbSggb3MpP3xwaG9uZXxwKGl4aXxyZSlcXC98cGx1Y2tlcnxwb2NrZXR8cHNwfHNlcmllcyg0fDYpMHxzeW1iaWFufHRyZW98dXBcXC4oYnJvd3NlcnxsaW5rKXx2b2RhZm9uZXx3YXB8d2luZG93cyAoY2V8cGhvbmUpfHhkYXx4aWluby9pLnRlc3QoYSl8fC8xMjA3fDYzMTB8NjU5MHwzZ3NvfDR0aHB8NTBbMS02XWl8Nzcwc3w4MDJzfGEgd2F8YWJhY3xhYyhlcnxvb3xzXFwtKXxhaShrb3xybil8YWwoYXZ8Y2F8Y28pfGFtb2l8YW4oZXh8bnl8eXcpfGFwdHV8YXIoY2h8Z28pfGFzKHRlfHVzKXxhdHR3fGF1KGRpfFxcLW18ciB8cyApfGF2YW58YmUoY2t8bGx8bnEpfGJpKGxifHJkKXxibChhY3xheil8YnIoZXx2KXd8YnVtYnxid1xcLShufHUpfGM1NVxcL3xjYXBpfGNjd2F8Y2RtXFwtfGNlbGx8Y2h0bXxjbGRjfGNtZFxcLXxjbyhtcHxuZCl8Y3Jhd3xkYShpdHxsbHxuZyl8ZGJ0ZXxkY1xcLXN8ZGV2aXxkaWNhfGRtb2J8ZG8oY3xwKW98ZHMoMTJ8XFwtZCl8ZWwoNDl8YWkpfGVtKGwyfHVsKXxlcihpY3xrMCl8ZXNsOHxleihbNC03XTB8b3N8d2F8emUpfGZldGN8Zmx5KFxcLXxfKXxnMSB1fGc1NjB8Z2VuZXxnZlxcLTV8Z1xcLW1vfGdvKFxcLnd8b2QpfGdyKGFkfHVuKXxoYWllfGhjaXR8aGRcXC0obXxwfHQpfGhlaVxcLXxoaShwdHx0YSl8aHAoIGl8aXApfGhzXFwtY3xodChjKFxcLXwgfF98YXxnfHB8c3x0KXx0cCl8aHUoYXd8dGMpfGlcXC0oMjB8Z298bWEpfGkyMzB8aWFjKCB8XFwtfFxcLyl8aWJyb3xpZGVhfGlnMDF8aWtvbXxpbTFrfGlubm98aXBhcXxpcmlzfGphKHR8dilhfGpicm98amVtdXxqaWdzfGtkZGl8a2VqaXxrZ3QoIHxcXC8pfGtsb258a3B0IHxrd2NcXC18a3lvKGN8ayl8bGUobm98eGkpfGxnKCBnfFxcLyhrfGx8dSl8NTB8NTR8XFwtW2Etd10pfGxpYnd8bHlueHxtMVxcLXd8bTNnYXxtNTBcXC98bWEodGV8dWl8eG8pfG1jKDAxfDIxfGNhKXxtXFwtY3J8bWUocmN8cmkpfG1pKG84fG9hfHRzKXxtbWVmfG1vKDAxfDAyfGJpfGRlfGRvfHQoXFwtfCB8b3x2KXx6eil8bXQoNTB8cDF8diApfG13YnB8bXl3YXxuMTBbMC0yXXxuMjBbMi0zXXxuMzAoMHwyKXxuNTAoMHwyfDUpfG43KDAoMHwxKXwxMCl8bmUoKGN8bSlcXC18b258dGZ8d2Z8d2d8d3QpfG5vayg2fGkpfG56cGh8bzJpbXxvcCh0aXx3dil8b3Jhbnxvd2cxfHA4MDB8cGFuKGF8ZHx0KXxwZHhnfHBnKDEzfFxcLShbMS04XXxjKSl8cGhpbHxwaXJlfHBsKGF5fHVjKXxwblxcLTJ8cG8oY2t8cnR8c2UpfHByb3h8cHNpb3xwdFxcLWd8cWFcXC1hfHFjKDA3fDEyfDIxfDMyfDYwfFxcLVsyLTddfGlcXC0pfHF0ZWt8cjM4MHxyNjAwfHJha3N8cmltOXxybyh2ZXx6byl8czU1XFwvfHNhKGdlfG1hfG1tfG1zfG55fHZhKXxzYygwMXxoXFwtfG9vfHBcXC0pfHNka1xcL3xzZShjKFxcLXwwfDEpfDQ3fG1jfG5kfHJpKXxzZ2hcXC18c2hhcnxzaWUoXFwtfG0pfHNrXFwtMHxzbCg0NXxpZCl8c20oYWx8YXJ8YjN8aXR8dDUpfHNvKGZ0fG55KXxzcCgwMXxoXFwtfHZcXC18diApfHN5KDAxfG1iKXx0MigxOHw1MCl8dDYoMDB8MTB8MTgpfHRhKGd0fGxrKXx0Y2xcXC18dGRnXFwtfHRlbChpfG0pfHRpbVxcLXx0XFwtbW98dG8ocGx8c2gpfHRzKDcwfG1cXC18bTN8bTUpfHR4XFwtOXx1cChcXC5ifGcxfHNpKXx1dHN0fHY0MDB8djc1MHx2ZXJpfHZpKHJnfHRlKXx2ayg0MHw1WzAtM118XFwtdil8dm00MHx2b2RhfHZ1bGN8dngoNTJ8NTN8NjB8NjF8NzB8ODB8ODF8ODN8ODV8OTgpfHczYyhcXC18ICl8d2ViY3x3aGl0fHdpKGcgfG5jfG53KXx3bWxifHdvbnV8eDcwMHx5YXNcXC18eW91cnx6ZXRvfHp0ZVxcLS9pLnRlc3QoYS5zdWJzdHIoMCw0KSkpY2hlY2sgPSB0cnVlfSkobmF2aWdhdG9yLnVzZXJBZ2VudHx8bmF2aWdhdG9yLnZlbmRvcnx8d2luZG93Lm9wZXJhKTtcblx0XHRyZXR1cm4gY2hlY2s7XG5cdH1cblx0XG5cdC8vIGh0dHA6Ly93d3cuam9uYXRoYW50bmVhbC5jb20vYmxvZy9wb2x5ZmlsbHMtYW5kLXByb3RvdHlwZXMvXG5cdCFTdHJpbmcucHJvdG90eXBlLnRyaW0gJiYgKFN0cmluZy5wcm90b3R5cGUudHJpbSA9IGZ1bmN0aW9uKCkge1xuXHRcdHJldHVybiB0aGlzLnJlcGxhY2UoL15cXHMrfFxccyskL2csICcnKTtcblx0fSk7XG5cblx0ZnVuY3Rpb24gVUlTZWFyY2goIGVsLCBvcHRpb25zICkge1x0XG5cdFx0dGhpcy5lbCA9IGVsO1xuXHRcdHRoaXMuaW5wdXRFbCA9IGVsLnF1ZXJ5U2VsZWN0b3IoICdmb3JtID4gaW5wdXQuc2Itc2VhcmNoLWlucHV0JyApO1xuXHRcdHRoaXMuX2luaXRFdmVudHMoKTtcblx0fVxuXG5cdFVJU2VhcmNoLnByb3RvdHlwZSA9IHtcblx0XHRfaW5pdEV2ZW50cyA6IGZ1bmN0aW9uKCkge1xuXHRcdFx0dmFyIHNlbGYgPSB0aGlzLFxuXHRcdFx0XHRpbml0U2VhcmNoRm4gPSBmdW5jdGlvbiggZXYgKSB7XG5cdFx0XHRcdFx0ZXYuc3RvcFByb3BhZ2F0aW9uKCk7XG5cdFx0XHRcdFx0Ly8gdHJpbSBpdHMgdmFsdWVcblx0XHRcdFx0XHRzZWxmLmlucHV0RWwudmFsdWUgPSBzZWxmLmlucHV0RWwudmFsdWUudHJpbSgpO1xuXHRcdFx0XHRcdFxuXHRcdFx0XHRcdGlmKCAhY2xhc3NpZS5oYXMoIHNlbGYuZWwsICdzYi1zZWFyY2gtb3BlbicgKSApIHsgLy8gb3BlbiBpdFxuXHRcdFx0XHRcdFx0ZXYucHJldmVudERlZmF1bHQoKTtcblx0XHRcdFx0XHRcdHNlbGYub3BlbigpO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0XHRlbHNlIGlmKCBjbGFzc2llLmhhcyggc2VsZi5lbCwgJ3NiLXNlYXJjaC1vcGVuJyApICYmIC9eXFxzKiQvLnRlc3QoIHNlbGYuaW5wdXRFbC52YWx1ZSApICkgeyAvLyBjbG9zZSBpdFxuXHRcdFx0XHRcdFx0ZXYucHJldmVudERlZmF1bHQoKTtcblx0XHRcdFx0XHRcdHNlbGYuY2xvc2UoKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH1cblxuXHRcdFx0dGhpcy5lbC5hZGRFdmVudExpc3RlbmVyKCAnY2xpY2snLCBpbml0U2VhcmNoRm4gKTtcblx0XHRcdHRoaXMuZWwuYWRkRXZlbnRMaXN0ZW5lciggJ3RvdWNoc3RhcnQnLCBpbml0U2VhcmNoRm4gKTtcblx0XHRcdHRoaXMuaW5wdXRFbC5hZGRFdmVudExpc3RlbmVyKCAnY2xpY2snLCBmdW5jdGlvbiggZXYgKSB7IGV2LnN0b3BQcm9wYWdhdGlvbigpOyB9KTtcblx0XHRcdHRoaXMuaW5wdXRFbC5hZGRFdmVudExpc3RlbmVyKCAndG91Y2hzdGFydCcsIGZ1bmN0aW9uKCBldiApIHsgZXYuc3RvcFByb3BhZ2F0aW9uKCk7IH0gKTtcblx0XHR9LFxuXHRcdG9wZW4gOiBmdW5jdGlvbigpIHtcblx0XHRcdHZhciBzZWxmID0gdGhpcztcblx0XHRcdGNsYXNzaWUuYWRkKCB0aGlzLmVsLCAnc2Itc2VhcmNoLW9wZW4nICk7XG5cdFx0XHQvLyBmb2N1cyB0aGUgaW5wdXRcblx0XHRcdGlmKCAhbW9iaWxlY2hlY2soKSApIHtcblx0XHRcdFx0dGhpcy5pbnB1dEVsLmZvY3VzKCk7XG5cdFx0XHR9XG5cdFx0XHQvLyBjbG9zZSB0aGUgc2VhcmNoIGlucHV0IGlmIGJvZHkgaXMgY2xpY2tlZFxuXHRcdFx0dmFyIGJvZHlGbiA9IGZ1bmN0aW9uKCBldiApIHtcblx0XHRcdFx0c2VsZi5jbG9zZSgpO1xuXHRcdFx0XHR0aGlzLnJlbW92ZUV2ZW50TGlzdGVuZXIoICdjbGljaycsIGJvZHlGbiApO1xuXHRcdFx0XHR0aGlzLnJlbW92ZUV2ZW50TGlzdGVuZXIoICd0b3VjaHN0YXJ0JywgYm9keUZuICk7XG5cdFx0XHR9O1xuXHRcdFx0ZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lciggJ2NsaWNrJywgYm9keUZuICk7XG5cdFx0XHRkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCAndG91Y2hzdGFydCcsIGJvZHlGbiApO1xuXHRcdH0sXG5cdFx0Y2xvc2UgOiBmdW5jdGlvbigpIHtcblx0XHRcdHRoaXMuaW5wdXRFbC5ibHVyKCk7XG5cdFx0XHRjbGFzc2llLnJlbW92ZSggdGhpcy5lbCwgJ3NiLXNlYXJjaC1vcGVuJyApO1xuXHRcdH1cblx0fVxuXG5cdC8vIGFkZCB0byBnbG9iYWwgbmFtZXNwYWNlXG5cdHdpbmRvdy5VSVNlYXJjaCA9IFVJU2VhcmNoO1xuXG59ICkoIHdpbmRvdyApOyJdLCJmaWxlIjoidWlzZWFyY2guanMifQ==
