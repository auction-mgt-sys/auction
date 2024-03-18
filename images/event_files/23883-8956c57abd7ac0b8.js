"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[23883],{23883:function(e,t,o){var r=o(26831),n=o(28193),p=o(2784),i=o(40489),l=o(34899),a=o(76224),s=o(69917),u=o(47591),c=o(65992),m=o(47746),d=o(43853),h=o(7342),g=o(6693),f=o(47711),Z=o(78647),v=o(98659),b=o(85954),w=o(8250),y=o(19570),x=o(43894),T=o(52322);let R=["arrow","children","classes","components","componentsProps","describeChild","disableFocusListener","disableHoverListener","disableInteractive","disableTouchListener","enterDelay","enterNextDelay","enterTouchDelay","followCursor","id","leaveDelay","leaveTouchDelay","onClose","onOpen","open","placement","PopperComponent","PopperProps","slotProps","slots","title","TransitionComponent","TransitionProps"],M=e=>{let{classes:t,disableInteractive:o,arrow:r,touch:n,placement:p}=e,i={popper:["popper",!o&&"popperInteractive",r&&"popperArrow"],tooltip:["tooltip",r&&"tooltipArrow",n&&"touch",`tooltipPlacement${(0,h.Z)(p.split("-")[0])}`],arrow:["arrow"]};return(0,a.Z)(i,x.Q,t)},P=(0,c.ZP)(f.Z,{name:"MuiTooltip",slot:"Popper",overridesResolver:(e,t)=>{let{ownerState:o}=e;return[t.popper,!o.disableInteractive&&t.popperInteractive,o.arrow&&t.popperArrow,!o.open&&t.popperClose]}})(({theme:e,ownerState:t,open:o})=>(0,n.Z)({zIndex:(e.vars||e).zIndex.tooltip,pointerEvents:"none"},!t.disableInteractive&&{pointerEvents:"auto"},!o&&{pointerEvents:"none"},t.arrow&&{[`&[data-popper-placement*="bottom"] .${x.Z.arrow}`]:{top:0,marginTop:"-0.71em","&::before":{transformOrigin:"0 100%"}},[`&[data-popper-placement*="top"] .${x.Z.arrow}`]:{bottom:0,marginBottom:"-0.71em","&::before":{transformOrigin:"100% 0"}},[`&[data-popper-placement*="right"] .${x.Z.arrow}`]:(0,n.Z)({},t.isRtl?{right:0,marginRight:"-0.71em"}:{left:0,marginLeft:"-0.71em"},{height:"1em",width:"0.71em","&::before":{transformOrigin:"100% 100%"}}),[`&[data-popper-placement*="left"] .${x.Z.arrow}`]:(0,n.Z)({},t.isRtl?{left:0,marginLeft:"-0.71em"}:{right:0,marginRight:"-0.71em"},{height:"1em",width:"0.71em","&::before":{transformOrigin:"0 0"}})})),E=(0,c.ZP)("div",{name:"MuiTooltip",slot:"Tooltip",overridesResolver:(e,t)=>{let{ownerState:o}=e;return[t.tooltip,o.touch&&t.touch,o.arrow&&t.tooltipArrow,t[`tooltipPlacement${(0,h.Z)(o.placement.split("-")[0])}`]]}})(({theme:e,ownerState:t})=>(0,n.Z)({backgroundColor:e.vars?e.vars.palette.Tooltip.bg:(0,u.Fq)(e.palette.grey[700],.92),borderRadius:(e.vars||e).shape.borderRadius,color:(e.vars||e).palette.common.white,fontFamily:e.typography.fontFamily,padding:"4px 8px",fontSize:e.typography.pxToRem(11),maxWidth:300,margin:2,wordWrap:"break-word",fontWeight:e.typography.fontWeightMedium},t.arrow&&{position:"relative",margin:0},t.touch&&{padding:"8px 16px",fontSize:e.typography.pxToRem(14),lineHeight:`${Math.round(1e5*(16/14))/1e5}em`,fontWeight:e.typography.fontWeightRegular},{[`.${x.Z.popper}[data-popper-placement*="left"] &`]:(0,n.Z)({transformOrigin:"right center"},t.isRtl?(0,n.Z)({marginLeft:"14px"},t.touch&&{marginLeft:"24px"}):(0,n.Z)({marginRight:"14px"},t.touch&&{marginRight:"24px"})),[`.${x.Z.popper}[data-popper-placement*="right"] &`]:(0,n.Z)({transformOrigin:"left center"},t.isRtl?(0,n.Z)({marginRight:"14px"},t.touch&&{marginRight:"24px"}):(0,n.Z)({marginLeft:"14px"},t.touch&&{marginLeft:"24px"})),[`.${x.Z.popper}[data-popper-placement*="top"] &`]:(0,n.Z)({transformOrigin:"center bottom",marginBottom:"14px"},t.touch&&{marginBottom:"24px"}),[`.${x.Z.popper}[data-popper-placement*="bottom"] &`]:(0,n.Z)({transformOrigin:"center top",marginTop:"14px"},t.touch&&{marginTop:"24px"})})),k=(0,c.ZP)("span",{name:"MuiTooltip",slot:"Arrow",overridesResolver:(e,t)=>t.arrow})(({theme:e})=>({overflow:"hidden",position:"absolute",width:"1em",height:"0.71em",boxSizing:"border-box",color:e.vars?e.vars.palette.Tooltip.bg:(0,u.Fq)(e.palette.grey[700],.9),"&::before":{content:'""',margin:"auto",display:"block",width:"100%",height:"100%",backgroundColor:"currentColor",transform:"rotate(45deg)"}})),O=!1,C=new l.V,L={x:0,y:0};function $(e,t){return o=>{t&&t(o),e(o)}}let S=p.forwardRef(function(e,t){var o,a,u,c,h,x,S,N,B,F,W,A,I,j,z,D,U,_,q;let H=(0,d.Z)({props:e,name:"MuiTooltip"}),{arrow:Q=!1,children:V,components:X={},componentsProps:Y={},describeChild:G=!1,disableFocusListener:J=!1,disableHoverListener:K=!1,disableInteractive:ee=!1,disableTouchListener:et=!1,enterDelay:eo=100,enterNextDelay:er=0,enterTouchDelay:en=700,followCursor:ep=!1,id:ei,leaveDelay:el=0,leaveTouchDelay:ea=1500,onClose:es,onOpen:eu,open:ec,placement:em="bottom",PopperComponent:ed,PopperProps:eh={},slotProps:eg={},slots:ef={},title:eZ,TransitionComponent:ev=g.Z,TransitionProps:eb}=H,ew=(0,r.Z)(H,R),ey=p.isValidElement(V)?V:(0,T.jsx)("span",{children:V}),ex=(0,m.Z)(),eT="rtl"===ex.direction,[eR,eM]=p.useState(),[eP,eE]=p.useState(null),ek=p.useRef(!1),eO=ee||ep,eC=(0,l.Z)(),eL=(0,l.Z)(),e$=(0,l.Z)(),eS=(0,l.Z)(),[eN,eB]=(0,y.Z)({controlled:ec,default:!1,name:"Tooltip",state:"open"}),eF=eN,eW=(0,b.Z)(ei),eA=p.useRef(),eI=(0,Z.Z)(()=>{void 0!==eA.current&&(document.body.style.WebkitUserSelect=eA.current,eA.current=void 0),eS.clear()});p.useEffect(()=>eI,[eI]);let ej=e=>{C.clear(),O=!0,eB(!0),eu&&!eF&&eu(e)},ez=(0,Z.Z)(e=>{C.start(800+el,()=>{O=!1}),eB(!1),es&&eF&&es(e),eC.start(ex.transitions.duration.shortest,()=>{ek.current=!1})}),eD=e=>{ek.current&&"touchstart"!==e.type||(eR&&eR.removeAttribute("title"),eL.clear(),e$.clear(),eo||O&&er?eL.start(O?er:eo,()=>{ej(e)}):ej(e))},eU=e=>{eL.clear(),e$.start(el,()=>{ez(e)})},{isFocusVisibleRef:e_,onBlur:eq,onFocus:eH,ref:eQ}=(0,w.Z)(),[,eV]=p.useState(!1),eX=e=>{eq(e),!1===e_.current&&(eV(!1),eU(e))},eY=e=>{eR||eM(e.currentTarget),eH(e),!0===e_.current&&(eV(!0),eD(e))},eG=e=>{ek.current=!0;let t=ey.props;t.onTouchStart&&t.onTouchStart(e)},eJ=e=>{eG(e),e$.clear(),eC.clear(),eI(),eA.current=document.body.style.WebkitUserSelect,document.body.style.WebkitUserSelect="none",eS.start(en,()=>{document.body.style.WebkitUserSelect=eA.current,eD(e)})},eK=e=>{ey.props.onTouchEnd&&ey.props.onTouchEnd(e),eI(),e$.start(ea,()=>{ez(e)})};p.useEffect(()=>{if(eF)return document.addEventListener("keydown",e),()=>{document.removeEventListener("keydown",e)};function e(e){("Escape"===e.key||"Esc"===e.key)&&ez(e)}},[ez,eF]);let e0=(0,v.Z)(ey.ref,eQ,eM,t);eZ||0===eZ||(eF=!1);let e1=p.useRef(),e4=e=>{let t=ey.props;t.onMouseMove&&t.onMouseMove(e),L={x:e.clientX,y:e.clientY},e1.current&&e1.current.update()},e7={},e2="string"==typeof eZ;G?(e7.title=eF||!e2||K?null:eZ,e7["aria-describedby"]=eF?eW:null):(e7["aria-label"]=e2?eZ:null,e7["aria-labelledby"]=eF&&!e2?eW:null);let e8=(0,n.Z)({},e7,ew,ey.props,{className:(0,i.Z)(ew.className,ey.props.className),onTouchStart:eG,ref:e0},ep?{onMouseMove:e4}:{}),e9={};et||(e8.onTouchStart=eJ,e8.onTouchEnd=eK),K||(e8.onMouseOver=$(eD,e8.onMouseOver),e8.onMouseLeave=$(eU,e8.onMouseLeave),eO||(e9.onMouseOver=eD,e9.onMouseLeave=eU)),J||(e8.onFocus=$(eY,e8.onFocus),e8.onBlur=$(eX,e8.onBlur),eO||(e9.onFocus=eY,e9.onBlur=eX));let e3=p.useMemo(()=>{var e;let t=[{name:"arrow",enabled:Boolean(eP),options:{element:eP,padding:4}}];return null!=(e=eh.popperOptions)&&e.modifiers&&(t=t.concat(eh.popperOptions.modifiers)),(0,n.Z)({},eh.popperOptions,{modifiers:t})},[eP,eh]),e5=(0,n.Z)({},H,{isRtl:eT,arrow:Q,disableInteractive:eO,placement:em,PopperComponentProp:ed,touch:ek.current}),e6=M(e5),te=null!=(o=null!=(a=ef.popper)?a:X.Popper)?o:P,tt=null!=(u=null!=(c=null!=(h=ef.transition)?h:X.Transition)?c:ev)?u:g.Z,to=null!=(x=null!=(S=ef.tooltip)?S:X.Tooltip)?x:E,tr=null!=(N=null!=(B=ef.arrow)?B:X.Arrow)?N:k,tn=(0,s.$)(te,(0,n.Z)({},eh,null!=(F=eg.popper)?F:Y.popper,{className:(0,i.Z)(e6.popper,null==eh?void 0:eh.className,null==(W=null!=(A=eg.popper)?A:Y.popper)?void 0:W.className)}),e5),tp=(0,s.$)(tt,(0,n.Z)({},eb,null!=(I=eg.transition)?I:Y.transition),e5),ti=(0,s.$)(to,(0,n.Z)({},null!=(j=eg.tooltip)?j:Y.tooltip,{className:(0,i.Z)(e6.tooltip,null==(z=null!=(D=eg.tooltip)?D:Y.tooltip)?void 0:z.className)}),e5),tl=(0,s.$)(tr,(0,n.Z)({},null!=(U=eg.arrow)?U:Y.arrow,{className:(0,i.Z)(e6.arrow,null==(_=null!=(q=eg.arrow)?q:Y.arrow)?void 0:_.className)}),e5);return(0,T.jsxs)(p.Fragment,{children:[p.cloneElement(ey,e8),(0,T.jsx)(te,(0,n.Z)({as:null!=ed?ed:f.Z,placement:em,anchorEl:ep?{getBoundingClientRect:()=>({top:L.y,left:L.x,right:L.x,bottom:L.y,width:0,height:0})}:eR,popperRef:e1,open:!!eR&&eF,id:eW,transition:!0},e9,tn,{popperOptions:e3,children:({TransitionProps:e})=>(0,T.jsx)(tt,(0,n.Z)({timeout:ex.transitions.duration.shorter},e,tp,{children:(0,T.jsxs)(to,(0,n.Z)({},ti,{children:[eZ,Q?(0,T.jsx)(tr,(0,n.Z)({},tl,{ref:eE})):null]}))}))}))]})});t.Z=S},43894:function(e,t,o){o.d(t,{Q:function(){return p}});var r=o(47645),n=o(6970);function p(e){return(0,n.ZP)("MuiTooltip",e)}let i=(0,r.Z)("MuiTooltip",["popper","popperInteractive","popperArrow","popperClose","tooltip","tooltipArrow","touch","tooltipPlacementLeft","tooltipPlacementRight","tooltipPlacementTop","tooltipPlacementBottom","arrow"]);t.Z=i}}]);
//# sourceMappingURL=23883-8956c57abd7ac0b8.js.map