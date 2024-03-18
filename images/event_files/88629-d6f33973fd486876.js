"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[88629],{88629:function(e,t,r){r.d(t,{Z:function(){return H}});var n=r(28193),l=r(26831),i=r(2784);r(48570);var o=r(40489),s=r(76224),a=r(64675),u=r(46425),p=r(80422),c=r(63673).Z,d=r(98659),f=r(25691),h=r(52322);let m=["actions","autoFocus","autoFocusItem","children","className","disabledItemsFocusable","disableListWrap","onKeyDown","variant"];function v(e,t,r){return e===t?e.firstChild:t&&t.nextElementSibling?t.nextElementSibling:r?null:e.firstChild}function g(e,t,r){return e===t?r?e.firstChild:e.lastChild:t&&t.previousElementSibling?t.previousElementSibling:r?null:e.lastChild}function b(e,t){if(void 0===t)return!0;let r=e.innerText;return void 0===r&&(r=e.textContent),0!==(r=r.trim().toLowerCase()).length&&(t.repeating?r[0]===t.keys[0]:0===r.indexOf(t.keys.join("")))}function y(e,t,r,n,l,i){let o=!1,s=l(e,t,!!t&&r);for(;s;){if(s===e.firstChild){if(o)return!1;o=!0}let t=!n&&(s.disabled||"true"===s.getAttribute("aria-disabled"));if(s.hasAttribute("tabindex")&&b(s,i)&&!t)return s.focus(),!0;s=l(e,s,r)}return!1}let Z=i.forwardRef(function(e,t){let{actions:r,autoFocus:o=!1,autoFocusItem:s=!1,children:a,className:Z,disabledItemsFocusable:M=!1,disableListWrap:w=!1,onKeyDown:P,variant:x="selectedMenu"}=e,C=(0,l.Z)(e,m),k=i.useRef(null),S=i.useRef({keys:[],repeating:!0,previousKeyMatched:!0,lastTime:null});(0,f.Z)(()=>{o&&k.current.focus()},[o]),i.useImperativeHandle(r,()=>({adjustStyleForScrollbar:(e,t)=>{let r=!k.current.style.width;if(e.clientHeight<k.current.clientHeight&&r){let r=`${c((0,u.Z)(e))}px`;k.current.style["rtl"===t.direction?"paddingLeft":"paddingRight"]=r,k.current.style.width=`calc(100% + ${r})`}return k.current}}),[]);let E=e=>{let t=k.current,r=e.key,n=(0,u.Z)(t).activeElement;if("ArrowDown"===r)e.preventDefault(),y(t,n,w,M,v);else if("ArrowUp"===r)e.preventDefault(),y(t,n,w,M,g);else if("Home"===r)e.preventDefault(),y(t,null,w,M,v);else if("End"===r)e.preventDefault(),y(t,null,w,M,g);else if(1===r.length){let l=S.current,i=r.toLowerCase(),o=performance.now();l.keys.length>0&&(o-l.lastTime>500?(l.keys=[],l.repeating=!0,l.previousKeyMatched=!0):l.repeating&&i!==l.keys[0]&&(l.repeating=!1)),l.lastTime=o,l.keys.push(i);let s=n&&!l.repeating&&b(n,l);l.previousKeyMatched&&(s||y(t,n,!1,M,v,l))?e.preventDefault():l.previousKeyMatched=!1}P&&P(e)},D=(0,d.Z)(k,t),F=-1;i.Children.forEach(a,(e,t)=>{if(!i.isValidElement(e)){F===t&&(F+=1)>=a.length&&(F=-1);return}e.props.disabled||("selectedMenu"===x&&e.props.selected?F=t:-1!==F||(F=t)),F===t&&(e.props.disabled||e.props.muiSkipListHighlight||e.type.muiSkipListHighlight)&&(F+=1)>=a.length&&(F=-1)});let T=i.Children.map(a,(e,t)=>{if(t===F){let t={};return s&&(t.autoFocus=!0),void 0===e.props.tabIndex&&"selectedMenu"===x&&(t.tabIndex=0),i.cloneElement(e,t)}return e});return(0,h.jsx)(p.Z,(0,n.Z)({role:"menu",ref:D,className:Z,onKeyDown:E,tabIndex:o?0:-1},C,{children:T}))});var M=r(47019),w=r(65992),P=r(47746),x=r(43853),C=r(47645),k=r(6970);function S(e){return(0,k.ZP)("MuiMenu",e)}(0,C.Z)("MuiMenu",["root","paper","list"]);let E=["onEntering"],D=["autoFocus","children","className","disableAutoFocusItem","MenuListProps","onClose","open","PaperProps","PopoverClasses","transitionDuration","TransitionProps","variant","slots","slotProps"],F={vertical:"top",horizontal:"right"},T={vertical:"top",horizontal:"left"},R=e=>{let{classes:t}=e;return(0,s.Z)({root:["root"],paper:["paper"],list:["list"]},S,t)},N=(0,w.ZP)(M.ZP,{shouldForwardProp:e=>(0,w.FO)(e)||"classes"===e,name:"MuiMenu",slot:"Root",overridesResolver:(e,t)=>t.root})({}),I=(0,w.ZP)(M.XS,{name:"MuiMenu",slot:"Paper",overridesResolver:(e,t)=>t.paper})({maxHeight:"calc(100% - 96px)",WebkitOverflowScrolling:"touch"}),K=(0,w.ZP)(Z,{name:"MuiMenu",slot:"List",overridesResolver:(e,t)=>t.list})({outline:0}),L=i.forwardRef(function(e,t){var r,s;let u=(0,x.Z)({props:e,name:"MuiMenu"}),{autoFocus:p=!0,children:c,className:d,disableAutoFocusItem:f=!1,MenuListProps:m={},onClose:v,open:g,PaperProps:b={},PopoverClasses:y,transitionDuration:Z="auto",TransitionProps:{onEntering:M}={},variant:w="selectedMenu",slots:C={},slotProps:k={}}=u,S=(0,l.Z)(u.TransitionProps,E),L=(0,l.Z)(u,D),H=(0,P.Z)(),j="rtl"===H.direction,A=(0,n.Z)({},u,{autoFocus:p,disableAutoFocusItem:f,MenuListProps:m,onEntering:M,PaperProps:b,transitionDuration:Z,TransitionProps:S,variant:w}),O=R(A),_=i.useRef(null),z=(e,t)=>{_.current&&_.current.adjustStyleForScrollbar(e,H),M&&M(e,t)},V=e=>{"Tab"===e.key&&(e.preventDefault(),v&&v(e,"tabKeyDown"))},W=-1;i.Children.map(c,(e,t)=>{i.isValidElement(e)&&(e.props.disabled||("selectedMenu"===w&&e.props.selected?W=t:-1!==W||(W=t)))});let $=null!=(r=C.paper)?r:I,U=null!=(s=k.paper)?s:b,X=(0,a.y)({elementType:C.root,externalSlotProps:k.root,ownerState:A,className:[O.root,d]}),q=(0,a.y)({elementType:$,externalSlotProps:U,ownerState:A,className:O.paper});return(0,h.jsx)(N,(0,n.Z)({onClose:v,anchorOrigin:{vertical:"bottom",horizontal:j?"right":"left"},transformOrigin:j?F:T,slots:{paper:$,root:C.root},slotProps:{root:X,paper:q},open:g,ref:t,transitionDuration:Z,TransitionProps:(0,n.Z)({onEntering:z},S),ownerState:A},L,{classes:y,children:(0,h.jsx)(K,(0,n.Z)({onKeyDown:V,actions:_,autoFocus:p&&(-1===W||f),autoFocusItem:p&&!f&&g,variant:w},m,{className:(0,o.Z)(O.list,m.className),children:c}))}))});var H=L}}]);
//# sourceMappingURL=88629-d6f33973fd486876.js.map