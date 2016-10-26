/* =============================================
 *
 *   FIXED RESPONSIVE NAV
 *
 *   (c) 2014 @adtileHQ
 *   http://www.adtile.me
 *   http://twitter.com/adtilehq
 *
 *   Free to use under the MIT License.
 *
 * ============================================= */
(function(){"use strict";if("querySelector"in document&&"addEventListener"in window){var e=function(e,t,n){for(var r=0;r<e.length;r++)t.call(n,r,e[r])};FastClick.attach(document.body),smoothScroll.init();var t=responsiveNav(".nav-collapse",{closeOnNavClick:!0}),n=document.createElement("div");n.className="mask",document.body.appendChild(n),navigator.userAgent.match(/Android/i)!==null&&(document.documentElement.className+=" android");var r=document.querySelector(".nav-collapse ul"),i=r.querySelectorAll("a"),s,o=function(){s=[],e(i,function(e,t){var n=i[e].getAttribute("href").replace("#","");s.push(document.getElementById(n).offsetTop+200)})};o(),window.addEventListener("resize",function(){o()},!1);var u=function(t){e(i,function(e,t){i[e].parentNode.className=""}),i[t].parentNode.className="active"},a=!1;window.addEventListener("scroll",function(){var t=window.pageYOffset,n=document.body.offsetHeight,r=window.innerHeight;a||e(s,function(e,i){i>t&&(i<t+300||t+r>=n)&&u(e)})},!1),n.addEventListener("click",function(e){e.preventDefault(),t.close()},!1);var f=function(){setTimeout(function(){a=!1},500)};document.querySelector(".logo").addEventListener("click",function(e){e.preventDefault(),a=!0,u(0),t.close(),history.pushState&&history.pushState("",document.title,window.location.pathname),f()},!1),e(i,function(e,t){i[e].addEventListener("click",function(t){t.preventDefault(),a=!0,u(e);var n=this.getAttribute("href").replace("#",""),r=document.getElementById(n);n!=="home"?(r.removeAttribute("id"),location.hash="#"+n,r.setAttribute("id",n)):history.pushState&&history.pushState("",document.title,window.location.pathname),f()},!1)})}})();