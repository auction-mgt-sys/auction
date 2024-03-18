"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[47711],{47711:function(e,t,n){n.d(t,{Z:function(){return eN}});var o,r,i,a,s,f=n(28193),p=n(26831),c=n(29172),l=n(93918),u=n(2784),d=n(9147),m=n(4428),h=n(32098);function v(e){if(null==e)return window;if("[object Window]"!==e.toString()){var t=e.ownerDocument;return t&&t.defaultView||window}return e}function y(e){var t=v(e).Element;return e instanceof t||e instanceof Element}function g(e){var t=v(e).HTMLElement;return e instanceof t||e instanceof HTMLElement}function b(e){if("undefined"==typeof ShadowRoot)return!1;var t=v(e).ShadowRoot;return e instanceof t||e instanceof ShadowRoot}var x=Math.max,w=Math.min,O=Math.round;function E(){var e=navigator.userAgentData;return null!=e&&e.brands&&Array.isArray(e.brands)?e.brands.map(function(e){return e.brand+"/"+e.version}).join(" "):navigator.userAgent}function j(){return!/^((?!chrome|android).)*safari/i.test(E())}function P(e,t,n){void 0===t&&(t=!1),void 0===n&&(n=!1);var o=e.getBoundingClientRect(),r=1,i=1;t&&g(e)&&(r=e.offsetWidth>0&&O(o.width)/e.offsetWidth||1,i=e.offsetHeight>0&&O(o.height)/e.offsetHeight||1);var a=(y(e)?v(e):window).visualViewport,s=!j()&&n,f=(o.left+(s&&a?a.offsetLeft:0))/r,p=(o.top+(s&&a?a.offsetTop:0))/i,c=o.width/r,l=o.height/i;return{width:c,height:l,top:p,right:f+c,bottom:p+l,left:f,x:f,y:p}}function D(e){var t=v(e);return{scrollLeft:t.pageXOffset,scrollTop:t.pageYOffset}}function R(e){return e?(e.nodeName||"").toLowerCase():null}function A(e){return((y(e)?e.ownerDocument:e.document)||window.document).documentElement}function k(e){return P(A(e)).left+D(e).scrollLeft}function M(e){return v(e).getComputedStyle(e)}function L(e){var t=M(e),n=t.overflow,o=t.overflowX,r=t.overflowY;return/auto|scroll|overlay|hidden/.test(n+r+o)}function W(e){var t=P(e),n=e.offsetWidth,o=e.offsetHeight;return 1>=Math.abs(t.width-n)&&(n=t.width),1>=Math.abs(t.height-o)&&(o=t.height),{x:e.offsetLeft,y:e.offsetTop,width:n,height:o}}function T(e){return"html"===R(e)?e:e.assignedSlot||e.parentNode||(b(e)?e.host:null)||A(e)}function Z(e,t){void 0===t&&(t=[]);var n,o=function e(t){return["html","body","#document"].indexOf(R(t))>=0?t.ownerDocument.body:g(t)&&L(t)?t:e(T(t))}(e),r=o===(null==(n=e.ownerDocument)?void 0:n.body),i=v(o),a=r?[i].concat(i.visualViewport||[],L(o)?o:[]):o,s=t.concat(a);return r?s:s.concat(Z(T(a)))}function B(e){return g(e)&&"fixed"!==M(e).position?e.offsetParent:null}function H(e){for(var t=v(e),n=B(e);n&&["table","td","th"].indexOf(R(n))>=0&&"static"===M(n).position;)n=B(n);return n&&("html"===R(n)||"body"===R(n)&&"static"===M(n).position)?t:n||function(e){var t=/firefox/i.test(E());if(/Trident/i.test(E())&&g(e)&&"fixed"===M(e).position)return null;var n=T(e);for(b(n)&&(n=n.host);g(n)&&0>["html","body"].indexOf(R(n));){var o=M(n);if("none"!==o.transform||"none"!==o.perspective||"paint"===o.contain||-1!==["transform","perspective"].indexOf(o.willChange)||t&&"filter"===o.willChange||t&&o.filter&&"none"!==o.filter)return n;n=n.parentNode}return null}(e)||t}var S="bottom",C="right",V="left",q="auto",N=["top",S,C,V],_="start",I="viewport",U="popper",F=N.reduce(function(e,t){return e.concat([t+"-"+_,t+"-end"])},[]),$=[].concat(N,[q]).reduce(function(e,t){return e.concat([t,t+"-"+_,t+"-end"])},[]),z=["beforeRead","read","afterRead","beforeMain","main","afterMain","beforeWrite","write","afterWrite"],X={placement:"bottom",modifiers:[],strategy:"absolute"};function Y(){for(var e=arguments.length,t=Array(e),n=0;n<e;n++)t[n]=arguments[n];return!t.some(function(e){return!(e&&"function"==typeof e.getBoundingClientRect)})}var G={passive:!0};function J(e){return e.split("-")[0]}function K(e){return e.split("-")[1]}function Q(e){return["top","bottom"].indexOf(e)>=0?"x":"y"}function ee(e){var t,n=e.reference,o=e.element,r=e.placement,i=r?J(r):null,a=r?K(r):null,s=n.x+n.width/2-o.width/2,f=n.y+n.height/2-o.height/2;switch(i){case"top":t={x:s,y:n.y-o.height};break;case S:t={x:s,y:n.y+n.height};break;case C:t={x:n.x+n.width,y:f};break;case V:t={x:n.x-o.width,y:f};break;default:t={x:n.x,y:n.y}}var p=i?Q(i):null;if(null!=p){var c="y"===p?"height":"width";switch(a){case _:t[p]=t[p]-(n[c]/2-o[c]/2);break;case"end":t[p]=t[p]+(n[c]/2-o[c]/2)}}return t}var et={top:"auto",right:"auto",bottom:"auto",left:"auto"};function en(e){var t,n,o,r,i,a,s,f=e.popper,p=e.popperRect,c=e.placement,l=e.variation,u=e.offsets,d=e.position,m=e.gpuAcceleration,h=e.adaptive,y=e.roundOffsets,g=e.isFixed,b=u.x,x=void 0===b?0:b,w=u.y,E=void 0===w?0:w,j="function"==typeof y?y({x:x,y:E}):{x:x,y:E};x=j.x,E=j.y;var P=u.hasOwnProperty("x"),D=u.hasOwnProperty("y"),R=V,k="top",L=window;if(h){var W=H(f),T="clientHeight",Z="clientWidth";W===v(f)&&"static"!==M(W=A(f)).position&&"absolute"===d&&(T="scrollHeight",Z="scrollWidth"),("top"===c||(c===V||c===C)&&"end"===l)&&(k=S,E-=(g&&W===L&&L.visualViewport?L.visualViewport.height:W[T])-p.height,E*=m?1:-1),(c===V||("top"===c||c===S)&&"end"===l)&&(R=C,x-=(g&&W===L&&L.visualViewport?L.visualViewport.width:W[Z])-p.width,x*=m?1:-1)}var B=Object.assign({position:d},h&&et),q=!0===y?(t={x:x,y:E},n=v(f),o=t.x,r=t.y,{x:O(o*(i=n.devicePixelRatio||1))/i||0,y:O(r*i)/i||0}):{x:x,y:E};return(x=q.x,E=q.y,m)?Object.assign({},B,((s={})[k]=D?"0":"",s[R]=P?"0":"",s.transform=1>=(L.devicePixelRatio||1)?"translate("+x+"px, "+E+"px)":"translate3d("+x+"px, "+E+"px, 0)",s)):Object.assign({},B,((a={})[k]=D?E+"px":"",a[R]=P?x+"px":"",a.transform="",a))}var eo={left:"right",right:"left",bottom:"top",top:"bottom"};function er(e){return e.replace(/left|right|bottom|top/g,function(e){return eo[e]})}var ei={start:"end",end:"start"};function ea(e){return e.replace(/start|end/g,function(e){return ei[e]})}function es(e,t){var n=t.getRootNode&&t.getRootNode();if(e.contains(t))return!0;if(n&&b(n)){var o=t;do{if(o&&e.isSameNode(o))return!0;o=o.parentNode||o.host}while(o)}return!1}function ef(e){return Object.assign({},e,{left:e.x,top:e.y,right:e.x+e.width,bottom:e.y+e.height})}function ep(e,t,n){var o,r,i,a,s,f,p,c,l,u;return t===I?ef(function(e,t){var n=v(e),o=A(e),r=n.visualViewport,i=o.clientWidth,a=o.clientHeight,s=0,f=0;if(r){i=r.width,a=r.height;var p=j();(p||!p&&"fixed"===t)&&(s=r.offsetLeft,f=r.offsetTop)}return{width:i,height:a,x:s+k(e),y:f}}(e,n)):y(t)?((o=P(t,!1,"fixed"===n)).top=o.top+t.clientTop,o.left=o.left+t.clientLeft,o.bottom=o.top+t.clientHeight,o.right=o.left+t.clientWidth,o.width=t.clientWidth,o.height=t.clientHeight,o.x=o.left,o.y=o.top,o):ef((r=A(e),a=A(r),s=D(r),f=null==(i=r.ownerDocument)?void 0:i.body,p=x(a.scrollWidth,a.clientWidth,f?f.scrollWidth:0,f?f.clientWidth:0),c=x(a.scrollHeight,a.clientHeight,f?f.scrollHeight:0,f?f.clientHeight:0),l=-s.scrollLeft+k(r),u=-s.scrollTop,"rtl"===M(f||a).direction&&(l+=x(a.clientWidth,f?f.clientWidth:0)-p),{width:p,height:c,x:l,y:u}))}function ec(){return{top:0,right:0,bottom:0,left:0}}function el(e){return Object.assign({},ec(),e)}function eu(e,t){return t.reduce(function(t,n){return t[n]=e,t},{})}function ed(e,t){void 0===t&&(t={});var n,o,r,i,a,s,f,p=t,c=p.placement,l=void 0===c?e.placement:c,u=p.strategy,d=void 0===u?e.strategy:u,m=p.boundary,h=p.rootBoundary,v=p.elementContext,b=void 0===v?U:v,O=p.altBoundary,E=p.padding,j=void 0===E?0:E,D=el("number"!=typeof j?j:eu(j,N)),k=e.rects.popper,L=e.elements[void 0!==O&&O?b===U?"reference":U:b],W=(n=y(L)?L:L.contextElement||A(e.elements.popper),s=(a=[].concat("clippingParents"===(o=void 0===m?"clippingParents":m)?(r=Z(T(n)),y(i=["absolute","fixed"].indexOf(M(n).position)>=0&&g(n)?H(n):n)?r.filter(function(e){return y(e)&&es(e,i)&&"body"!==R(e)}):[]):[].concat(o),[void 0===h?I:h]))[0],(f=a.reduce(function(e,t){var o=ep(n,t,d);return e.top=x(o.top,e.top),e.right=w(o.right,e.right),e.bottom=w(o.bottom,e.bottom),e.left=x(o.left,e.left),e},ep(n,s,d))).width=f.right-f.left,f.height=f.bottom-f.top,f.x=f.left,f.y=f.top,f),B=P(e.elements.reference),V=ee({reference:B,element:k,strategy:"absolute",placement:l}),q=ef(Object.assign({},k,V)),_=b===U?q:B,F={top:W.top-_.top+D.top,bottom:_.bottom-W.bottom+D.bottom,left:W.left-_.left+D.left,right:_.right-W.right+D.right},$=e.modifiersData.offset;if(b===U&&$){var z=$[l];Object.keys(F).forEach(function(e){var t=[C,S].indexOf(e)>=0?1:-1,n=["top",S].indexOf(e)>=0?"y":"x";F[e]+=z[n]*t})}return F}function em(e,t,n){return x(e,w(t,n))}function eh(e,t,n){return void 0===n&&(n={x:0,y:0}),{top:e.top-t.height-n.y,right:e.right-t.width+n.x,bottom:e.bottom-t.height+n.y,left:e.left-t.width-n.x}}function ev(e){return["top",C,S,V].some(function(t){return e[t]>=0})}var ey=(i=void 0===(r=(o={defaultModifiers:[{name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:function(e){var t=e.state,n=e.instance,o=e.options,r=o.scroll,i=void 0===r||r,a=o.resize,s=void 0===a||a,f=v(t.elements.popper),p=[].concat(t.scrollParents.reference,t.scrollParents.popper);return i&&p.forEach(function(e){e.addEventListener("scroll",n.update,G)}),s&&f.addEventListener("resize",n.update,G),function(){i&&p.forEach(function(e){e.removeEventListener("scroll",n.update,G)}),s&&f.removeEventListener("resize",n.update,G)}},data:{}},{name:"popperOffsets",enabled:!0,phase:"read",fn:function(e){var t=e.state,n=e.name;t.modifiersData[n]=ee({reference:t.rects.reference,element:t.rects.popper,strategy:"absolute",placement:t.placement})},data:{}},{name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:function(e){var t=e.state,n=e.options,o=n.gpuAcceleration,r=n.adaptive,i=n.roundOffsets,a=void 0===i||i,s={placement:J(t.placement),variation:K(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:void 0===o||o,isFixed:"fixed"===t.options.strategy};null!=t.modifiersData.popperOffsets&&(t.styles.popper=Object.assign({},t.styles.popper,en(Object.assign({},s,{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:void 0===r||r,roundOffsets:a})))),null!=t.modifiersData.arrow&&(t.styles.arrow=Object.assign({},t.styles.arrow,en(Object.assign({},s,{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:a})))),t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-placement":t.placement})},data:{}},{name:"applyStyles",enabled:!0,phase:"write",fn:function(e){var t=e.state;Object.keys(t.elements).forEach(function(e){var n=t.styles[e]||{},o=t.attributes[e]||{},r=t.elements[e];g(r)&&R(r)&&(Object.assign(r.style,n),Object.keys(o).forEach(function(e){var t=o[e];!1===t?r.removeAttribute(e):r.setAttribute(e,!0===t?"":t)}))})},effect:function(e){var t=e.state,n={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,n.popper),t.styles=n,t.elements.arrow&&Object.assign(t.elements.arrow.style,n.arrow),function(){Object.keys(t.elements).forEach(function(e){var o=t.elements[e],r=t.attributes[e]||{},i=Object.keys(t.styles.hasOwnProperty(e)?t.styles[e]:n[e]).reduce(function(e,t){return e[t]="",e},{});g(o)&&R(o)&&(Object.assign(o.style,i),Object.keys(r).forEach(function(e){o.removeAttribute(e)}))})}},requires:["computeStyles"]},{name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:function(e){var t=e.state,n=e.options,o=e.name,r=n.offset,i=void 0===r?[0,0]:r,a=$.reduce(function(e,n){var o,r,a,s,f,p;return e[n]=(o=t.rects,a=[V,"top"].indexOf(r=J(n))>=0?-1:1,f=(s="function"==typeof i?i(Object.assign({},o,{placement:n})):i)[0],p=s[1],f=f||0,p=(p||0)*a,[V,C].indexOf(r)>=0?{x:p,y:f}:{x:f,y:p}),e},{}),s=a[t.placement],f=s.x,p=s.y;null!=t.modifiersData.popperOffsets&&(t.modifiersData.popperOffsets.x+=f,t.modifiersData.popperOffsets.y+=p),t.modifiersData[o]=a}},{name:"flip",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,o=e.name;if(!t.modifiersData[o]._skip){for(var r=n.mainAxis,i=void 0===r||r,a=n.altAxis,s=void 0===a||a,f=n.fallbackPlacements,p=n.padding,c=n.boundary,l=n.rootBoundary,u=n.altBoundary,d=n.flipVariations,m=void 0===d||d,h=n.allowedAutoPlacements,v=t.options.placement,y=J(v),g=[v].concat(f||(y!==v&&m?function(e){if(J(e)===q)return[];var t=er(e);return[ea(e),t,ea(t)]}(v):[er(v)])).reduce(function(e,n){var o,r,i,a,s,f,u,d,v,y,g,b;return e.concat(J(n)===q?(r=(o={placement:n,boundary:c,rootBoundary:l,padding:p,flipVariations:m,allowedAutoPlacements:h}).placement,i=o.boundary,a=o.rootBoundary,s=o.padding,f=o.flipVariations,d=void 0===(u=o.allowedAutoPlacements)?$:u,0===(g=(y=(v=K(r))?f?F:F.filter(function(e){return K(e)===v}):N).filter(function(e){return d.indexOf(e)>=0})).length&&(g=y),Object.keys(b=g.reduce(function(e,n){return e[n]=ed(t,{placement:n,boundary:i,rootBoundary:a,padding:s})[J(n)],e},{})).sort(function(e,t){return b[e]-b[t]})):n)},[]),b=t.rects.reference,x=t.rects.popper,w=new Map,O=!0,E=g[0],j=0;j<g.length;j++){var P=g[j],D=J(P),R=K(P)===_,A=["top",S].indexOf(D)>=0,k=A?"width":"height",M=ed(t,{placement:P,boundary:c,rootBoundary:l,altBoundary:u,padding:p}),L=A?R?C:V:R?S:"top";b[k]>x[k]&&(L=er(L));var W=er(L),T=[];if(i&&T.push(M[D]<=0),s&&T.push(M[L]<=0,M[W]<=0),T.every(function(e){return e})){E=P,O=!1;break}w.set(P,T)}if(O)for(var Z=m?3:1,B=function(e){var t=g.find(function(t){var n=w.get(t);if(n)return n.slice(0,e).every(function(e){return e})});if(t)return E=t,"break"},H=Z;H>0&&"break"!==B(H);H--);t.placement!==E&&(t.modifiersData[o]._skip=!0,t.placement=E,t.reset=!0)}},requiresIfExists:["offset"],data:{_skip:!1}},{name:"preventOverflow",enabled:!0,phase:"main",fn:function(e){var t=e.state,n=e.options,o=e.name,r=n.mainAxis,i=n.altAxis,a=n.boundary,s=n.rootBoundary,f=n.altBoundary,p=n.padding,c=n.tether,l=void 0===c||c,u=n.tetherOffset,d=void 0===u?0:u,m=ed(t,{boundary:a,rootBoundary:s,padding:p,altBoundary:f}),h=J(t.placement),v=K(t.placement),y=!v,g=Q(h),b="x"===g?"y":"x",O=t.modifiersData.popperOffsets,E=t.rects.reference,j=t.rects.popper,P="function"==typeof d?d(Object.assign({},t.rects,{placement:t.placement})):d,D="number"==typeof P?{mainAxis:P,altAxis:P}:Object.assign({mainAxis:0,altAxis:0},P),R=t.modifiersData.offset?t.modifiersData.offset[t.placement]:null,A={x:0,y:0};if(O){if(void 0===r||r){var k,M="y"===g?"top":V,L="y"===g?S:C,T="y"===g?"height":"width",Z=O[g],B=Z+m[M],q=Z-m[L],N=l?-j[T]/2:0,I=v===_?E[T]:j[T],U=v===_?-j[T]:-E[T],F=t.elements.arrow,$=l&&F?W(F):{width:0,height:0},z=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:ec(),X=z[M],Y=z[L],G=em(0,E[T],$[T]),ee=y?E[T]/2-N-G-X-D.mainAxis:I-G-X-D.mainAxis,et=y?-E[T]/2+N+G+Y+D.mainAxis:U+G+Y+D.mainAxis,en=t.elements.arrow&&H(t.elements.arrow),eo=en?"y"===g?en.clientTop||0:en.clientLeft||0:0,er=null!=(k=null==R?void 0:R[g])?k:0,ei=em(l?w(B,Z+ee-er-eo):B,Z,l?x(q,Z+et-er):q);O[g]=ei,A[g]=ei-Z}if(void 0!==i&&i){var ea,es,ef=O[b],ep="y"===b?"height":"width",el=ef+m["x"===g?"top":V],eu=ef-m["x"===g?S:C],eh=-1!==["top",V].indexOf(h),ev=null!=(ea=null==R?void 0:R[b])?ea:0,ey=eh?el:ef-E[ep]-j[ep]-ev+D.altAxis,eg=eh?ef+E[ep]+j[ep]-ev-D.altAxis:eu,eb=l&&eh?(es=em(ey,ef,eg))>eg?eg:es:em(l?ey:el,ef,l?eg:eu);O[b]=eb,A[b]=eb-ef}t.modifiersData[o]=A}},requiresIfExists:["offset"]},{name:"arrow",enabled:!0,phase:"main",fn:function(e){var t,n,o=e.state,r=e.name,i=e.options,a=o.elements.arrow,s=o.modifiersData.popperOffsets,f=J(o.placement),p=Q(f),c=[V,C].indexOf(f)>=0?"height":"width";if(a&&s){var l=el("number"!=typeof(t="function"==typeof(t=i.padding)?t(Object.assign({},o.rects,{placement:o.placement})):t)?t:eu(t,N)),u=W(a),d=o.rects.reference[c]+o.rects.reference[p]-s[p]-o.rects.popper[c],m=s[p]-o.rects.reference[p],h=H(a),v=h?"y"===p?h.clientHeight||0:h.clientWidth||0:0,y=l["y"===p?"top":V],g=v-u[c]-l["y"===p?S:C],b=v/2-u[c]/2+(d/2-m/2),x=em(y,b,g);o.modifiersData[r]=((n={})[p]=x,n.centerOffset=x-b,n)}},effect:function(e){var t=e.state,n=e.options.element,o=void 0===n?"[data-popper-arrow]":n;null!=o&&("string"!=typeof o||(o=t.elements.popper.querySelector(o)))&&es(t.elements.popper,o)&&(t.elements.arrow=o)},requires:["popperOffsets"],requiresIfExists:["preventOverflow"]},{name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:function(e){var t=e.state,n=e.name,o=t.rects.reference,r=t.rects.popper,i=t.modifiersData.preventOverflow,a=ed(t,{elementContext:"reference"}),s=ed(t,{altBoundary:!0}),f=eh(a,o),p=eh(s,r,i),c=ev(f),l=ev(p);t.modifiersData[n]={referenceClippingOffsets:f,popperEscapeOffsets:p,isReferenceHidden:c,hasPopperEscaped:l},t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-reference-hidden":c,"data-popper-escaped":l})}}]}).defaultModifiers)?[]:r,s=void 0===(a=o.defaultOptions)?X:a,function(e,t,n){void 0===n&&(n=s);var o,r={placement:"bottom",orderedModifiers:[],options:Object.assign({},X,s),modifiersData:{},elements:{reference:e,popper:t},attributes:{},styles:{}},a=[],f=!1,p={state:r,setOptions:function(n){var o,f,l,u,d,m="function"==typeof n?n(r.options):n;c(),r.options=Object.assign({},s,r.options,m),r.scrollParents={reference:y(e)?Z(e):e.contextElement?Z(e.contextElement):[],popper:Z(t)};var h=(f=Object.keys(o=[].concat(i,r.options.modifiers).reduce(function(e,t){var n=e[t.name];return e[t.name]=n?Object.assign({},n,t,{options:Object.assign({},n.options,t.options),data:Object.assign({},n.data,t.data)}):t,e},{})).map(function(e){return o[e]}),l=new Map,u=new Set,d=[],f.forEach(function(e){l.set(e.name,e)}),f.forEach(function(e){u.has(e.name)||function e(t){u.add(t.name),[].concat(t.requires||[],t.requiresIfExists||[]).forEach(function(t){if(!u.has(t)){var n=l.get(t);n&&e(n)}}),d.push(t)}(e)}),z.reduce(function(e,t){return e.concat(d.filter(function(e){return e.phase===t}))},[]));return r.orderedModifiers=h.filter(function(e){return e.enabled}),r.orderedModifiers.forEach(function(e){var t=e.name,n=e.options,o=e.effect;if("function"==typeof o){var i=o({state:r,name:t,instance:p,options:void 0===n?{}:n});a.push(i||function(){})}}),p.update()},forceUpdate:function(){if(!f){var e,t,n,o,i,a,s,c,l,u,d,m,h=r.elements,y=h.reference,b=h.popper;if(Y(y,b)){r.rects={reference:(t=H(b),n="fixed"===r.options.strategy,o=g(t),c=g(t)&&(a=O((i=t.getBoundingClientRect()).width)/t.offsetWidth||1,s=O(i.height)/t.offsetHeight||1,1!==a||1!==s),l=A(t),u=P(y,c,n),d={scrollLeft:0,scrollTop:0},m={x:0,y:0},(o||!o&&!n)&&(("body"!==R(t)||L(l))&&(d=(e=t)!==v(e)&&g(e)?{scrollLeft:e.scrollLeft,scrollTop:e.scrollTop}:D(e)),g(t)?(m=P(t,!0),m.x+=t.clientLeft,m.y+=t.clientTop):l&&(m.x=k(l))),{x:u.left+d.scrollLeft-m.x,y:u.top+d.scrollTop-m.y,width:u.width,height:u.height}),popper:W(b)},r.reset=!1,r.placement=r.options.placement,r.orderedModifiers.forEach(function(e){return r.modifiersData[e.name]=Object.assign({},e.data)});for(var x=0;x<r.orderedModifiers.length;x++){if(!0===r.reset){r.reset=!1,x=-1;continue}var w=r.orderedModifiers[x],E=w.fn,j=w.options,M=void 0===j?{}:j,T=w.name;"function"==typeof E&&(r=E({state:r,options:M,name:T,instance:p})||r)}}}},update:function(){return o||(o=new Promise(function(e){Promise.resolve().then(function(){o=void 0,e(new Promise(function(e){p.forceUpdate(),e(r)}))})})),o},destroy:function(){c(),f=!0}};if(!Y(e,t))return p;function c(){a.forEach(function(e){return e()}),a=[]}return p.setOptions(n).then(function(e){!f&&n.onFirstUpdate&&n.onFirstUpdate(e)}),p}),eg=n(76224),eb=n(83820),ex=n(6970);let ew="base";function eO(e,t){let n=ex._v[t];return n?`${ew}--${n}`:`${ew}-${e}-${t}`}let eE="Popper";function ej(e){return eO(eE,e)}!function(e,t){let n={};t.forEach(t=>{n[t]=eO(e,t)})}(eE,["root"]);var eP=n(64675),eD=n(52322);let eR=u.createContext({disableDefaultClasses:!1}),eA=["anchorEl","children","direction","disablePortal","modifiers","open","placement","popperOptions","popperRef","slotProps","slots","TransitionProps","ownerState"],ek=["anchorEl","children","container","direction","disablePortal","keepMounted","modifiers","open","placement","popperOptions","popperRef","style","transition","slotProps","slots"];function eM(e){return"function"==typeof e?e():e}let eL=()=>(0,eg.Z)({root:["root"]},function(e){let{disableDefaultClasses:t}=u.useContext(eR);return n=>t?"":e(n)}(ej)),eW={},eT=u.forwardRef(function(e,t){var n;let{anchorEl:o,children:r,direction:i,disablePortal:a,modifiers:s,open:f,placement:p,popperOptions:h,popperRef:v,slotProps:y={},slots:g={},TransitionProps:b}=e,x=(0,l.Z)(e,eA),w=u.useRef(null),O=(0,d.Z)(w,t),E=u.useRef(null),j=(0,d.Z)(E,v),P=u.useRef(j);(0,m.Z)(()=>{P.current=j},[j]),u.useImperativeHandle(v,()=>E.current,[]);let D=function(e,t){if("ltr"===t)return e;switch(e){case"bottom-end":return"bottom-start";case"bottom-start":return"bottom-end";case"top-end":return"top-start";case"top-start":return"top-end";default:return e}}(p,i),[R,A]=u.useState(D),[k,M]=u.useState(eM(o));u.useEffect(()=>{E.current&&E.current.forceUpdate()}),u.useEffect(()=>{o&&M(eM(o))},[o]),(0,m.Z)(()=>{if(!k||!f)return;let e=e=>{A(e.placement)},t=[{name:"preventOverflow",options:{altBoundary:a}},{name:"flip",options:{altBoundary:a}},{name:"onUpdate",enabled:!0,phase:"afterWrite",fn:({state:t})=>{e(t)}}];null!=s&&(t=t.concat(s)),h&&null!=h.modifiers&&(t=t.concat(h.modifiers));let n=ey(k,w.current,(0,c.Z)({placement:D},h,{modifiers:t}));return P.current(n),()=>{n.destroy(),P.current(null)}},[k,a,s,f,h,D]);let L={placement:R};null!==b&&(L.TransitionProps=b);let W=eL(),T=null!=(n=g.root)?n:"div",Z=(0,eP.y)({elementType:T,externalSlotProps:y.root,externalForwardedProps:x,additionalProps:{role:"tooltip",ref:O},ownerState:e,className:W.root});return(0,eD.jsx)(T,(0,c.Z)({},Z,{children:"function"==typeof r?r(L):r}))}),eZ=u.forwardRef(function(e,t){let n;let{anchorEl:o,children:r,container:i,direction:a="ltr",disablePortal:s=!1,keepMounted:f=!1,modifiers:p,open:d,placement:m="bottom",popperOptions:v=eW,popperRef:y,style:g,transition:b=!1,slotProps:x={},slots:w={}}=e,O=(0,l.Z)(e,ek),[E,j]=u.useState(!0),P=()=>{j(!1)},D=()=>{j(!0)};if(!f&&!d&&(!b||E))return null;if(i)n=i;else if(o){let e=eM(o);n=e&&void 0!==e.nodeType?(0,h.Z)(e).body:(0,h.Z)(null).body}return(0,eD.jsx)(eb.h,{disablePortal:s,container:n,children:(0,eD.jsx)(eT,(0,c.Z)({anchorEl:o,direction:a,disablePortal:s,modifiers:p,ref:t,open:b?!E:d,placement:m,popperOptions:v,popperRef:y,slotProps:x,slots:w},O,{style:(0,c.Z)({position:"fixed",top:0,left:0,display:!d&&f&&(!b||E)?"none":void 0},g),TransitionProps:b?{in:d,onEnter:P,onExited:D}:void 0,children:r}))})});var eB=n(38457),eH=n(65992),eS=n(43853);let eC=["anchorEl","component","components","componentsProps","container","disablePortal","keepMounted","modifiers","open","placement","popperOptions","popperRef","transition","slots","slotProps"],eV=(0,eH.ZP)(eZ,{name:"MuiPopper",slot:"Root",overridesResolver:(e,t)=>t.root})({}),eq=u.forwardRef(function(e,t){var n;let o=(0,eB.Z)(),r=(0,eS.Z)({props:e,name:"MuiPopper"}),{anchorEl:i,component:a,components:s,componentsProps:c,container:l,disablePortal:u,keepMounted:d,modifiers:m,open:h,placement:v,popperOptions:y,popperRef:g,transition:b,slots:x,slotProps:w}=r,O=(0,p.Z)(r,eC),E=null!=(n=null==x?void 0:x.root)?n:null==s?void 0:s.Root,j=(0,f.Z)({anchorEl:i,container:l,disablePortal:u,keepMounted:d,modifiers:m,open:h,placement:v,popperOptions:y,popperRef:g,transition:b},O);return(0,eD.jsx)(eV,(0,f.Z)({as:a,direction:null==o?void 0:o.direction,slots:{root:E},slotProps:null!=w?w:c},j,{ref:t}))});var eN=eq}}]);
//# sourceMappingURL=47711-13feca365246a8ed.js.map