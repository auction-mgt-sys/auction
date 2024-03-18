"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[93792],{45848:function(e,n,t){t.d(n,{N:function(){return a}});var i=t(25237),r=t.n(i),s=t(46159),a=r()(function(){return t.e(61668).then(t.bind(t,61668)).then(function(e){return e.AddToCartButton})},{loadableGenerated:{webpack:function(){return[61668]}},ssr:!1,loading:s.F})},22163:function(e,n,t){t.d(n,{e:function(){return E}});var i=t(70865),r=t(52322),s=t(14625),a=t(47842),o=t(13011),c=(0,t(98116).ZL)()(function(e){var n=e.breakpoints;return{root:(0,a.Z)({},n.down("lg"),{minWidth:o.r0})}}),l=t(24862),u=t(92549),d=t(62197),m=t(68052),f=t(52417),p=t(84853),v=t(59877),h=function(e){var n=e.classes,t=void 0===n?{}:n,i=e.caption,s=e.ItemComponent,a=e.onValueChange,o=e.paymentPlans,c=e.selectedPaymentPlanName,u=e.selectedProductLicenseType,h=e.title,y=e.shouldShowP32338Design,b=void 0!==y&&y,g=e.showP32433Cad,P=void 0!==g&&g,S=(0,v.$G)(m.Fx_).t;return(0,r.jsxs)(l.Z,{pb:5,"data-automation":"PaymentPlanSelectV2",children:[(0,r.jsx)(l.Z,{pb:3,className:t.paymentPlanSelectValueListContainer,children:(0,r.jsx)(f.H,{title:h,tooltipText:b?i:void 0,values:o,onValueChange:a,ItemComponent:s,itemProps:{selectedItemId:c,selectedProductLicenseType:u},shouldShowP32338Design:b})}),(0,r.jsx)(r.Fragment,{children:!b&&(0,p.FT)(i).map(function(e,n){return(0,r.jsx)(l.Z,{children:(0,r.jsx)(d.Z,{className:t.paymentPlanSelectValueListCaptions,variant:"caption",color:"textSecondary","aria-label":"On Demand Caption",children:P?(0,r.jsxs)(r.Fragment,{children:[S("on_demand_pack_specific_caption",{ns:m.AH})," ",S("prices_shown_in_cad_addl_taxes_may_apply")]}):e})},"cap-".concat(n))})})]})};h.defaultProps={caption:"",onValueChange:function(){},paymentPlans:[]};var y=t(78871),b=t(30902),g=t(40124),P=t(23694),S=t(96670),w={feature:h,id:P.P,variations:[function(e){return(0,r.jsx)(h,(0,S.Z)((0,i.Z)({},e),{showP32433Cad:!0}))}]},L=(0,g.h$)(w.feature,w.id,w.variations),T=t(87080),_=t(62545),C=function(e){var n,t,i,s,a,o=e.classes,c=void 0===o?{}:o,d=e.actions,m=e.data,f=e.selectedProductLicenseType,p=e.selectedItemName,v=e.asset,g=e.shouldShowP32338Design,P=(0,_.b)({asset:v}),S=P?L:h,w=P?T.p:y.p;return(0,r.jsxs)(r.Fragment,{children:[m.tabs&&(0,r.jsx)(l.Z,{pb:4,className:c.imageProductSelectorComponentTabsContainer,children:(0,r.jsx)(u.Z,{className:c.imageProductSelectorComponentTabs,value:m.tabIndex,onChange:d.onTabChange,indicatorColor:"primary",textColor:"inherit",children:m.tabs.map(function(e){var n=e.label,t=e.analyticsLabel;return(0,r.jsx)(b.O,{className:c.imageProductSelectorComponentTab,label:n,labelTrack:t},n)})})}),(0,r.jsx)(S,{classes:c,caption:null===(n=m.productSelector)||void 0===n?void 0:null===(t=n.labels)||void 0===t?void 0:t.caption,ItemComponent:w,onValueChange:d.onItemSelect,paymentPlans:null===(i=m.productSelector)||void 0===i?void 0:i.items,selectedPaymentPlanName:p,selectedProductLicenseType:f,title:null===(s=m.productSelector)||void 0===s?void 0:null===(a=s.labels)||void 0===a?void 0:a.title,shouldShowP32338Design:void 0!==g&&g})]})};C.defaultProps={action:{},classes:{},data:{}};var F=t(87394),x=t(1104),z=t(7819),Z=t(65532),I=t(2784),D=t(66680),A=function(){var e,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=n.initialTabIndex,r=n.productSelectorsMap,o=void 0===r?{}:r,c=n.products,l=void 0===c?[]:c,u=n.selectedProductLicenseType,d=n.setSelectedProductToBuy,f=void 0===d?function(){return""}:d,p=n.overrideTabs,h=(0,v.$G)([m.AH,m.Fx_,m.S69]).t,y=(0,Z.PE)(),b=(0,F.Z)((0,I.useState)(void 0===t?0:t),2),g=b[0],P=b[1],w=(0,I.useCallback)(function(e,n){P(n)},[]),L=(0,I.useMemo)(function(){return(0,x.Gk)({productSelectorsMap:o,products:l,t:h,locale:y})},[l,o,h,y]),T=(0,I.useMemo)(function(){return(0,x.JU)({tabs:p||s.wZ,t:h})},[h,p]),_=(0,I.useMemo)(function(){return u===z.HS?D.NP:0===g?D.PU:s.Y$},[u,g]),C=(0,I.useMemo)(function(){return L[_]},[_,L]),A=(0,F.Z)((0,I.useState)((0,x.aY)({productSelectorsMap:L})),2),E=A[0],B=A[1],k=(0,I.useCallback)(function(e){var n=e.name,t=e.product.id;f((0,x.lk)({id:t,products:l})),B(function(e){return(0,S.Z)((0,i.Z)({},e),(0,a.Z)({},_,{name:n,id:t}))})},[_,l,f]),N=null===(e=E[_])||void 0===e?void 0:e.name;return(0,I.useEffect)(function(){if(E&&E[_]){var e=E[_].id;f((0,x.lk)({id:e,products:l}))}},[_,E]),{actions:{onTabChange:w,onItemSelect:k},data:{productSelector:C,tabs:(0,I.useMemo)(function(){return u===z.HS?null:T},[u,T]),tabIndex:g,selectedItemName:N}}},E=function(e){var n=e.classes,t=void 0===n?{}:n,a=e.initialTabIndex,o=e.products,l=e.productSelectorsMap,u=void 0===l?s.GN:l,d=e.selectedProductLicenseType,m=e.setSelectedProductToBuy,f=e.shouldShowSelection,p=e.overrideTabs,v=e.asset,h=e.shouldShowP32338Design,y=c(),b=y.classes,g=y.cx,P=(0,i.Z)({},t,{root:g(b.root,t.root)}),S=A({initialTabIndex:void 0===a?0:a,productSelectorsMap:u,products:o,selectedProductLicenseType:d,setSelectedProductToBuy:m,overrideTabs:void 0===p?void 0:p}),w=S.actions,L=S.data;return(0,r.jsx)(C,{actions:w,classes:P,data:L,selectedProductLicenseType:d,selectedItemName:(void 0===f||f)&&L.selectedItemName||"",asset:void 0===v?{}:v,shouldShowP32338Design:void 0!==h&&h})}},66680:function(e,n,t){t.d(n,{BH:function(){return b},MA:function(){return g},NP:function(){return d},PU:function(){return u}});var i,r,s,a=t(47842),o=t(68052),c=t(14625),l=t(27739),u="subscription",d="enhanced",m="packs",f={translations:{caption:["activation-drawers:sub_product_disclaimer"]},items:[{name:l.tq,translations:{price:"activation-drawers:price_per_month"}},{name:l.v8,translations:{price:"activation-drawers:price_per_month"}},{name:l.dm,translations:{price:"activation-drawers:price_per_month"}}]};o.S69,l.v8,l.tq,l.dm,l.tq,l.cz,l.dF,l.EV,l.KB,l.Dy;var p={translations:{title:"images:on_demand_description",namespace:o.jp2,caption:"on_demand_caption"},items:[{name:l._x},{name:l.vC},{name:l.cL}]},v={translations:{title:"enhanced_legal_protections",caption:"on_demand_caption"},items:[{name:l.zW},{name:l.vI},{name:l.jh}]},h={translations:{title:"credit_packs_title",caption:"on_demand_caption"},items:[{name:l.KQ},{name:l.bP},{name:l.me}]},y={translations:{title:"enhanced_generic_legal_protections",caption:"on_demand_caption"},items:[{name:l.me},{name:l.xY},{name:l.SD}]};i={},(0,a.Z)(i,u,f),(0,a.Z)(i,m,h),(0,a.Z)(i,d,y),l.KQ,l.bP,l.me;var b=(r={},(0,a.Z)(r,m,p),(0,a.Z)(r,d,v),r),g=(s={},(0,a.Z)(s,u,c.AT),(0,a.Z)(s,m,p),(0,a.Z)(s,d,v),s)},12581:function(e,n,t){t.d(n,{v:function(){return c}});var i=t(52322),r=t(21647),s=t(47999),a=t(36888),o=(0,t(98116).ZL)()(function(){return{actionLink:{width:"100%",display:"flex",justifyContent:"center"}}}),c=function(e){var n=e.analyticsLabel,t=e.onClick,c=e.label,l=e.ready,u=e.classesProps,d=o(),m=d.classes,f=d.cx,p=(0,a.bo)().classes;return(0,i.jsx)("div",{className:f(u.actionLink,m.actionLink),children:(0,i.jsx)(s.z,{className:p.buttonAnchor,color:"inherit",onClick:t,"aria-label":c,labelTrack:n,"data-automation":"ActionLink",children:(0,i.jsx)("span",{className:u.label,children:l?c:(0,i.jsx)(r.Z,{variant:"text",width:100})})})})};c.defaultProps={analyticsLabel:"",classesProps:{}}},84519:function(e,n,t){t.d(n,{e:function(){return y}});var i=t(70865),r=t(52322),s=t(45848),a=t(46159),o=t(25237),c=t.n(o),l=c()(function(){return Promise.all([t.e(67601),t.e(10516)]).then(t.bind(t,11201)).then(function(e){return e.BuyAndDownloadButton})},{loadableGenerated:{webpack:function(){return[11201]}},ssr:!1,loading:a.F}),u=c()(function(){return t.e(15646).then(t.bind(t,15646)).then(function(e){return e.GetAnotherPlanButton})},{loadableGenerated:{webpack:function(){return[15646]}},ssr:!1,loading:function(){return(0,r.jsx)(a.F,{monitoringOrigin:"GetAnotherPlanButton"})}}),d=t(55577),m=c()(function(){return Promise.all([t.e(83451),t.e(80792)]).then(t.bind(t,80792)).then(function(e){return e.RedownloadButton})},{loadableGenerated:{webpack:function(){return[80792]}},ssr:!1}),f=t(86669),p=t(29292),v=t(44297),h=t(73377),y=function(e){var n=e.asset,t=e.eligibility,o=e.eligibilityError,c=e.isLoadingData,y=e.onAddToCartSuccess,b=e.onAddToCartFailure,g=e.onLicensingSuccess,P=e.onRedownloadSuccess,S=e.RedownloadSecondaryButton,w=e.redownloadSecondaryButtonProps,L=e.selectedAssetSize,T=e.selectedPaymentPlan,_=e.selectedProductLicenseType,C=e.selectedShadowsOption,F=e.showAddToCartButton,x=e.showBuyAndDownloadButton,z=e.showGetAnotherPlanButton,Z=e.showLicenseButton,I=e.showRedownloadButton,D=e.showWarningMessage,A=e.clickAnalyticsLabels,E=e.membershipProps;if(c)return(0,r.jsx)(a.F,{monitoringOrigin:"DrawerCta-".concat(null==n?void 0:n.type)});var B=t.licenses,k=(0,v.PD)(n),N={brandCategory:(0,p.f_)(n),productLine:(0,p.Rz)(n)};return F?(0,r.jsx)(s.N,(0,i.Z)({asset:n,itemsToAdd:[(0,f.zg)({asset:n,assetSize:L,license:null==_?void 0:_.license})],isDisabled:o,onAddToCartSuccess:y,onAddToCartFailure:b,selectedProductLicenseType:_,setAddToCartStatus:D,clickAnalyticsLabel:(0,h.U_)((void 0===A?{}:A).addToCartButton)},k&&N)):I?(0,r.jsx)(m,(0,i.Z)({asset:n,licenses:void 0===B?[]:B,isDisabled:o,onRedownloadSuccess:P,SecondaryButton:S,secondaryButtonProps:w,selectedAssetSize:L,selectedShadowsOption:C,showWarningMessage:D},k&&N)):Z?(0,r.jsx)(d.f,{assetInfo:{asset:n,selectedAssetSize:L,paymentPlan:T,licenseName:null==_?void 0:_.license,selectedShadowsOption:C},isDisabled:(null==T?void 0:T.isDisabled)||o,onLicensingSuccess:g,setLicensingStatus:D,membershipProps:E}):x?(0,r.jsx)(l,{asset:n,assetSize:L,product:_,selectedShadowsOption:C,selectedProductLicenseType:_,setCreateOrderStatus:D,isDisabled:o}):z?(0,r.jsx)(u,{}):null};y.defaultProps={eligibility:{},eligibilityError:!1,onAddToCartSuccess:function(){},onAddToCartFailure:function(){},onLicensingSuccess:function(){},onRedownloadSuccess:function(){},RedownloadSecondaryButton:null,redownloadSecondaryButtonProps:{},selectedPaymentPlan:{},selectedProductLicenseType:{},showAddToCartButton:!1,showBuyAndDownloadButton:!1,showLicenseButton:!1,showRedownloadButton:!1,showGetAnotherPlanButton:!1,showWarningMessage:function(){},membershipProps:{}}},41913:function(e,n,t){t.d(n,{X:function(){return m}});var i=t(47842),r=t(70865),s=t(96670),a=t(44699),o=t(7819),c=t(87646),l=t(34293),u=t(87414),d=t(2784),m=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.allSizesAssetEligibility,t=e.products,m=e.selectedProductLicenseType,f=e.setSelectedProductLicenseType,p=e.isFlexProduct,v=e.isOffsetAsset,h=void 0!==v&&v,y=e.isRedownloadFlow,b=e.paymentPlansForCreditCostCalculation,g=e.showPaymentPlanSelect,P=e.hasExistingLicenseForSelectedLicenseType,S=e.labels,w=void 0===S?{}:S,L=e.isExperimentUTLZ564,T=void 0!==L&&L,_=e.isEnhancedRedownloadFlow,C=void 0!==_&&_,F=e.userHasEnhancedPackOrSub,x=void 0!==F&&F,z=e.selectedPlanLicenseType,Z=void 0===z?o.ur:z,I=(0,d.useMemo)(function(){return Array.isArray(t)?(h?o.$I:o.Ji).map(function(e){return null==t?void 0:t.find(function(n){return n.name===e})}):[]},[t,h]),D=(0,d.useMemo)(function(){return(0,c.V)({eligibility:n,licenseTypes:[o.ur,o.HS]})},[n]),A=D.ownsStandardLicense,E=D.ownsEnhancedLicense,B=(0,d.useMemo)(function(){return{hasEligibleSubscriptionForEnhancedLicense:(0,l.i)({subscriptions:n.subscriptions,licenseName:o.HS}),hasEligibleSubscriptionForStandardLicense:(0,l.i)({subscriptions:n.subscriptions,licenseName:o.ur})}},[n]),k=B.hasEligibleSubscriptionForEnhancedLicense,N=B.hasEligibleSubscriptionForStandardLicense,M=(0,d.useMemo)(function(){var e;return p?(e={},(0,i.Z)(e,o.ur,(0,u.Kg)({paymentPlans:b,licenseType:o.ur})),(0,i.Z)(e,o.HS,(0,u.Kg)({paymentPlans:b,licenseType:o.HS})),e):{}},[b,p]),j=(0,d.useMemo)(function(){return I.map(function(e){var n=(null==e?void 0:e.license)===o.ur,t=(null==e?void 0:e.license)===o.HS;return(0,s.Z)((0,r.Z)({},e,n&&{displayIncluded:A||E&&h||N&&!p,displayPrice:h,isDisabled:E},t&&{displayIncluded:E||k&&!p,displayPrice:h,isDisabled:!1}),{creditCostsByLicenseType:M,analyticsLabel:(null==e?void 0:e.license)&&"typeSelected - ".concat(null==e?void 0:e.license,"License")})})},[M,k,N,E,A,I,p,h]),H=(0,d.useMemo)(function(){if(y){if(T){if(C)return{status:a.H_,message:w.alreadyLicensed};if(!x&&Z===o.ur)return{status:a.cM,message:w.alreadyLicensedInStandardButCanUpgradeToEnhanced};if(x){if(!Z===o.ur)return{status:a.cM,message:w.alreadyLicensedInStandardButCanLicenseInEnhanced};if(Z===o.ur)return{status:a.H_,message:w.alreadyLicensed}}}return P?{status:a.H_,message:w.alreadyLicensed}:g?{status:a.cM,message:w.alreadyLicensedInStandardButCanLicenseInEnhanced}:{status:a.cM,message:w.alreadyLicensedInStandard}}return null},[P,C,T,y,w.alreadyLicensed,w.alreadyLicensedInStandard,w.alreadyLicensedInStandardButCanLicenseInEnhanced,w.alreadyLicensedInStandardButCanUpgradeToEnhanced,Z,g,x]);return(0,d.useEffect)(function(){var e,t=(null==m?void 0:m.id)===(null==I?void 0:null===(e=I[0])||void 0===e?void 0:e.id);if((!m||t&&E)&&(null==I?void 0:I[0])&&(null==n?void 0:n.subscriptions)){if(E||!A&&(0,l.i)({subscriptions:n.subscriptions,licenseName:o.HS})&&!(0,l.i)({subscriptions:n.subscriptions,licenseName:o.ur})){f(I[1]);return}f(I[0])}},[n.subscriptions,E,A,I,m,f]),{formattedProductLicenseTypes:j,licenseTypeDrawerStatusMessageProps:H}}},4737:function(e,n,t){t.d(n,{$r:function(){return p},C7:function(){return a},Si:function(){return f},ZZ:function(){return c},fI:function(){return d},fu:function(){return u},ik:function(){return o},tx:function(){return l},w:function(){return m}});var i,r=t(47842),s=t(27739),a="LICENSING",o="LOADING",c="PURCHASING",l="none",u=(i={},(0,r.Z)(i,s.vC,2),(0,r.Z)(i,s._x,5),(0,r.Z)(i,s.cL,25),(0,r.Z)(i,s.vI,2),(0,r.Z)(i,s.zW,5),(0,r.Z)(i,s.jh,25),i),d="Download for free",m="Download",f="Tier100",p="NonTier100"},97834:function(e,n,t){t.d(n,{T:function(){return C}});var i=t(70865),r=t(96670),s=t(87394),a=t(27739),o=t(44699),c=t(74500),l=t(7819),u=t(22565),d=t(97637),m=t(58185),f=t(20096),p=t(65229),v=function(e){var n=e.eligibility,t=void 0===n?{}:n,i=t.licenses,r=t.subscriptions;return!(0,p.R)({licenses:void 0===i?[]:i})&&!(0,f.z)({subscriptions:void 0===r?[]:r})},h=t(97376),y=function(e){var n=e.eligibility,t=void 0===n?{}:n,i=t.licenses,r=t.subscriptions,s=e.selectedProductLicenseType;return!(0,h.V)({licenses:void 0===i?[]:i,selectedProductLicenseType:s})&&(0,f.z)({subscriptions:void 0===r?[]:r})},b=t(87414),g=t(95775),P=t(12649),S=t(2784),w=t(4737),L=t(31175),T={},_={subscriptions:[]},C=function(){var e,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=n.asset,f=n.products,p=n.setLicenseDrawerState,C=n.setLicenseDrawerStatus,F=void 0===C?function(){}:C,x=n.isExperimentUTLZ564,z=void 0!==x&&x,Z=(0,P.B)(),I=(0,u.v)(),D=((null==I?void 0:I.current)?I.current.isPeacock:null)&&"vector"===t.imageType,A=(0,S.useMemo)(function(){return D?(0,L.cz)(t).filter(function(e){return"vector_eps"!==e.name}):(0,L.cz)(t)},[t,D]),E=(0,s.Z)((0,S.useState)(null==A?void 0:A[0]),2),B=E[0],k=E[1],N=(0,s.Z)((0,S.useState)(),2),M=N[0],j=N[1],H=(0,s.Z)((0,S.useState)({}),2),O=H[0],R=H[1],G=(0,s.Z)((0,S.useState)({}),2),U=G[0],V=G[1],K=(0,s.Z)((0,S.useState)("on"),2),W=K[0],Y=K[1],$=(0,s.Z)((0,S.useState)({selectedShadowsOption:W,format:null==B?void 0:B.format}),2),X=$[0],Q=$[1],q=(0,g.IP)({assets:[t]}),J=q.data,ee=void 0===J?{}:J,en=q.error,et=(0,g.IP)({assets:[t],licenseName:null==M?void 0:M.license}),ei=et.data,er=et.error||en;Z||(ee=_,ei=T);var es=(ei||{}).subscriptions,ea=void 0===es?[]:es,eo=(null==ei?void 0:null===(e=ei.licenses)||void 0===e?void 0:e.length)>0,ec=(0,S.useMemo)(function(){return(0,b.OG)({product:O})},[O]),el=(0,S.useMemo)(function(){return(0,b.XD)({name:null==M?void 0:M.name})},[M]),eu=!er&&void 0===ei||void 0===f,ed=!eu&&(0,d.Y)({eligibility:ei,selectedProductLicenseType:M,selectedPaymentPlan:O}),em=(0,S.useMemo)(function(){return(0,m.r)({eligibility:ei,enhancedLicenseType:l.HS,selectedProductLicenseType:M})},[ei,M]),ef=(0,S.useMemo)(function(){return!el&&em},[el,em]),ep=(0,S.useMemo)(function(){return el&&em},[el,em]),ev=(0,S.useMemo)(function(){return v({eligibility:ei})},[ei]),eh=(0,S.useMemo)(function(){return y({eligibility:ei,selectedProductLicenseType:M})},[ei,M]),ey=(0,S.useMemo)(function(){return eu?w.ik:ed||ef||ep?w.ZZ:w.C7},[eu,ef,ep,ed]),eb=(0,S.useMemo)(function(){var e;return null!=ei&&null!==(e=ei.licenses)&&void 0!==e&&!!e.some(function(e){return e.licenseName===a.PS})&&(null==M?void 0:M.license)===l.ur||(0,h.V)({licenses:null==ei?void 0:ei.licenses,selectedProductLicenseType:M})},[null==ei?void 0:ei.licenses,M]),eg=(0,S.useMemo)(function(){if(!z&&eb)return{paymentPlans:[],showPaymentPlanSelect:!1};var e=ea;return(null==M?void 0:M.license)===l.ur&&(e=ea.filter(function(e){return e.license===l.ur})),(null==M?void 0:M.license)===l.HS&&(e=ea.filter(function(e){var n=e.license,t=e.isEligibleForDownload;return n===l.HS&&t})),{paymentPlans:e.map(function(e){return(0,r.Z)((0,i.Z)({},e),{isDisabled:!e.isEligibleForDownload})}),paymentPlansForCreditCostCalculation:ea,showPaymentPlanSelect:!eu&&!!e.length}},[eb,eu,null==M?void 0:M.license,ea,z]),eP=eg.paymentPlans,eS=eg.paymentPlansForCreditCostCalculation,ew=eg.showPaymentPlanSelect,eL=(0,S.useMemo)(function(){return(0,L.H4)(ee)},[ee]);return(0,S.useEffect)(function(){if(ei&&!er){var e=(null==M?void 0:M.license)===l.ur?eP.find(function(e){var n=e.isDisabled,t=e.activityTracking,i=e.license;return!n&&!(t===a.bk&&i===l.HS)}):eP.find(function(e){return!e.isDisabled});e||(e=(0,s.Z)(eP,1)[0]),R(e)}},[ei,er,eP,null==M?void 0:M.license,R]),(0,S.useEffect)(function(){er&&!ei?F({status:o.pn,error:c.R}):F({status:"",error:void 0})},[er,ei,F]),(0,S.useEffect)(function(){return p({assetId:t.id,selectedImageSize:B,selectedPaymentPlan:O,selectedProductLicenseType:M,selectedProductToBuy:U})},[t.id,B,O,M,U,p]),(0,S.useEffect)(function(){if(B){var e=(B||{}).format;if((null==X?void 0:X.format)!==e)switch(e){case"png":Y(null==X?void 0:X.selectedShadowsOption),Q({selectedShadowsOption:W,format:e});break;case"psd":Q({selectedShadowsOption:W,format:e}),Y("off")}}},[B,W,X]),{selectedImageSize:B,selectedProductLicenseType:M,selectedPaymentPlan:O,selectedProductToBuy:U,selectedShadowsOption:W,setSelectedImageSize:k,setSelectedProductLicenseType:j,setSelectedPaymentPlan:R,setSelectedProductToBuy:V,setSelectedShadowsOption:Y,eligibility:ei,eligibilityError:er,allSizesAssetEligibility:ee,formattedImageSizes:A,paymentPlans:eP,paymentPlansForCreditCostCalculation:eS,showAddToCartButton:ep,showBuyAndDownloadButton:ef,showGetAnotherPlanButton:ev,showDownloadButton:eh,showProductsToPurchase:ed,showPaymentPlanSelect:ew,isLoadingData:eu,isRedownloadFlow:eo,isFlexProduct:ec,hasLegacyMultiShareSubscription:eL,hasExistingLicenseForSelectedLicenseType:eb,drawerState:ey}}},37082:function(e,n,t){t.d(n,{T:function(){return u}});var i=t(87394),r=t(52322),s=t(68052),a=t(9390),o=t(81034),c=t(51578),l=t(59877),u=function(){var e=(0,l.$G)(s.AH),n=e.t,t=e.ready,u=(0,i.Z)((0,c.a9)(),1)[0];return{labels:{alreadyLicensed:n("already_licensed_item"),alreadyLicensedInStandard:n("already_downloaded_under_standard_license"),alreadyLicensedInStandardButCanLicenseInEnhanced:n("already_downloaded_under_standard_license_redownload_or_license"),alreadyLicensedInEnhancedButCanLicenseInStandard:n("already_downloaded_under_enhance_license_redownload_or_license"),assetSizeFormat:n("image_size_and_format"),alreadyLicensedInStandardButCanUpgradeToEnhanced:n("already_downloaded_under_standard_license_redownload_or_upgrade_to_enhanced"),errorMessage:n("notifications:label_generic_failure"),licenseType:n("license_type"),cancel:n("common:actions_cancel"),sizeGuide:n("feature-image-resizer:size_guide"),downloadLimitWarning:n("download_limit_warning"),pausedPlanWarning:(0,r.jsx)(l.cC,{ns:s.AH,i18nKey:"paused_plan_warning",components:{a:(0,r.jsx)(a.r,{target:"_blank",style:{textDecoration:"underline"},clickAnalyticsLabel:"".concat(o.y3p,".valuePropPause_goToPlans"),href:u})},t:n}),viewAllImagePlans:n("view_all_image_plans"),offsetPurchaseDisclaimer:n("offset_purchase_disclaimer"),outOfCredits:n("out_of_downloads_weve_got_you"),selectSizeFormat:n("select_size_format"),upgrade:n("upgrade_to_enhanced_license"),legalCompare:n("compare_lage_coverage"),useYourPlan:n("use_your_plan")},ready:t}}},31175:function(e,n,t){t.d(n,{H4:function(){return h},cG:function(){return p},cz:function(){return v}});var i=t(47842),r=t(70865),s=t(96670),a=t(27739),o=t(7819),c=t(87646),l=t(34293),u=t(87414),d=t(37546),m=t(68769),f=t(2784),p=function(e){var n=e.allSizesAssetEligibility,t=e.selectedProductLicenseType,a=e.isFlexProduct,d=e.isOffsetAsset,m=e.paymentPlansForCreditCostCalculation,p=(null==t?void 0:t.license)===o.ur,v=(null==t?void 0:t.license)===o.HS,h=(0,f.useMemo)(function(){return(0,c.V)({eligibility:n,licenseTypes:[o.ur,o.HS]})},[n]),y=h.ownsStandardLicense,b=h.ownsEnhancedLicense,g=(0,f.useMemo)(function(){return{hasEligibleSubscriptionForEnhancedLicense:(0,l.i)({subscriptions:null==n?void 0:n.subscriptions,licenseName:o.HS}),hasEligibleSubscriptionForStandardLicense:(0,l.i)({subscriptions:null==n?void 0:n.subscriptions,licenseName:o.ur})}},[n]),P=g.hasEligibleSubscriptionForEnhancedLicense,S=g.hasEligibleSubscriptionForStandardLicense,w=(0,f.useMemo)(function(){var e;return a?(e={},(0,i.Z)(e,o.ur,(0,u.Kg)({paymentPlans:m,licenseType:o.ur,selectedPaymentPlan:null})),(0,i.Z)(e,o.HS,(0,u.Kg)({paymentPlans:m,licenseType:o.HS,selectedPaymentPlan:null})),e):{}},[m,a]);return(0,s.Z)((0,r.Z)({},t,p&&{displayIncluded:y||b&&d||S&&!a,displayPrice:d,isDisabled:b},v&&{displayIncluded:b||P&&!a,displayPrice:d,isDisabled:!1}),{creditCostsByLicenseType:w,analyticsLabel:(null==t?void 0:t.license)&&"typeSelected - ".concat(null==t?void 0:t.license,"License")})},v=function(e){var n=e.sizes,t=Object.values(void 0===n?{}:n)||[],i=(0,m.RO)({sizes:t});return(0,d.hQ)(i)},h=function(e){var n=e.subscriptions;return null==n?void 0:n.some(function(e){var n=e.productName;return a.Kg.includes(n)})}},55577:function(e,n,t){t.d(n,{f:function(){return o}});var i=t(52322),r=t(25237),s=t.n(r),a=t(46159),o=s()(function(){return Promise.all([t.e(83451),t.e(34911),t.e(83493)]).then(t.bind(t,39499)).then(function(e){return e.LicensingButton})},{loadableGenerated:{webpack:function(){return[39499]}},ssr:!1,loading:function(){return(0,i.jsx)(a.F,{monitoringOrigin:"LicensingButton"})}})},84179:function(e,n,t){t.d(n,{F:function(){return d}});var i=t(52322),r=t(25237),s=t.n(r),a=s()(function(){return Promise.all([t.e(47125),t.e(38213)]).then(t.bind(t,35538)).then(function(e){return e.EditorialTerms})},{loadableGenerated:{webpack:function(){return[35538]}},ssr:!1}),o=s()(function(){return Promise.all([t.e(47125),t.e(34787)]).then(t.bind(t,80338)).then(function(e){return e.GeneratedAssetTerms})},{loadableGenerated:{webpack:function(){return[80338]}},ssr:!1}),c=t(43637),l=t(18174),u=t(2784),d=function(e){var n=e.asset,t=e.isTermsChecked,r=e.setTermsCheckbox,s=(0,l.pi)(n),d=(0,c.k7)(n);return((0,u.useEffect)(function(){s||d||r(!0)},[s,d,r]),s)?(0,i.jsx)(a,{asset:n,isTermsChecked:t,onCheckboxChange:r}):d?(0,i.jsx)(o,{isTermsChecked:t,onCheckboxChange:r}):null};d.defaultProps={isTermsChecked:!1}},74500:function(e,n,t){t.d(n,{R:function(){return i}});var i="eligibilityErrorNoEligibility"},87080:function(e,n,t){t.d(n,{p:function(){return p}});var i=t(70865),r=t(96670),s=t(52322),a=t(34805),o=t(858),c=t(9707),l=t(94054),u=t(24861),d=t(87414),m=t(22921),f=t(2784),p=function(e){var n=e.item,t=e.selectedItemId,p=e.selectedProductLicenseType,v=e.highlightComponent,h=(0,c.y)(),y=h.classes,b=h.cx,g=(0,m.o)(),P=n.product,S=n.discountPercentage,w=(0,o._)({item:n,selectedItemId:t,selectedProductLicenseType:p}),L=(null==P?void 0:P.downloadCredits)||(null==P?void 0:P.allotmentCredits),T=(0,f.useMemo)(function(){var e,n=P.allotmentCredits,t=(0,d.g7)({product:P}),i=(0,d.Dg)({product:P}),r=p===l.cNV,s=(0,d.Yc)({product:P}),a=s&&!i?12:1,o=null==P?void 0:null===(e=P.prices)||void 0===e?void 0:e.cad,c=s?(o/12).toFixed(2):o,u=(o/a/(t?r?n/20:n:L)).toFixed(2),m=S?((o-o/100*S)/a/(t?n:L)).toFixed(2):u;return{pricePerMonth:c,pricePerAsset:u,pricePerAssetDiscounted:m,pricePerPaymentInterval:o}},[S,L,P,p]),_=T.pricePerPaymentInterval,C=T.pricePerAsset,F=T.pricePerAssetDiscounted,x={formattedPricePerPaymentInterval:g({price:_,localeCurrencyOverride:"cad",priceType:u.Br}),formattedPricePerAsset:g({price:C,localeCurrencyOverride:"cad",priceType:u.Br}),formattedPricePerAssetDiscounted:g({price:F,localeCurrencyOverride:"cad",priceType:u.Br})},z=(0,r.Z)((0,i.Z)({},w),{price:x.formattedPricePerPaymentInterval,pricePerAsset:x.formattedPricePerAsset,pricePerAssetDiscounted:x.formattedPricePerAssetDiscounted});return(0,s.jsx)(a.a,{classes:y,cx:b,data:z,labels:n.labels,highlightComponent:v})}},62545:function(e,n,t){t.d(n,{b:function(){return s}});var i=t(44297),r=t(9206),s=function(e){var n=e.asset,t=(0,r.R)();return 0===Object.keys(n).length?t:t&&[i.aT,i.f8,i.vV,i.hb,i.yw,i.Am].map(function(e){return e(n)}).some(Boolean)}},87646:function(e,n,t){t.d(n,{V:function(){return r}});var i=t(87394),r=function(e){var n=e.eligibility,t=e.licenseTypes,r=(void 0===n?{}:n).licenses,s=(0,i.Z)(t,2),a=s[0],o=s[1];return(void 0===r?[]:r).reduce(function(e,n){var t=n.licenseName;return t===a&&(e.ownsStandardLicense=!0),t===o&&(e.ownsEnhancedLicense=!0),e},{})}},20096:function(e,n,t){t.d(n,{z:function(){return i}});var i=function(){var e=(arguments.length>0&&void 0!==arguments[0]?arguments[0]:{}).subscriptions;return!!(null==e?void 0:e.find(function(e){return e.isEligibleForDownload}))}},34293:function(e,n,t){t.d(n,{i:function(){return i}});var i=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.subscriptions,t=void 0===n?[]:n,i=e.licenseName,r=void 0===i?"":i;return null==t?void 0:t.some(function(e){var n=e.license,t=e.isEligibleForDownload;return n===r&&t})}},97376:function(e,n,t){t.d(n,{V:function(){return i}});var i=function(e){var n=e.licenses,t=e.selectedProductLicenseType,i=void 0===t?{}:t;return(void 0===n?[]:n).some(function(e){return e.licenseName===i.license})}},65229:function(e,n,t){t.d(n,{R:function(){return s}});var i=t(27739),r=t(7819),s=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.licenses,t=e.licenseType;return t&&(null==n?void 0:n.length)?!!n.some(function(e){return e.licenseName===i.PS})&&t===r.ur||!!n.filter(function(e){return e.licenseName===t}).length:!!(null==n?void 0:n.length)}},58185:function(e,n,t){t.d(n,{r:function(){return s}});var i=t(97376),r=t(97637),s=function(e){var n=e.eligibility,t=void 0===n?{}:n,s=t.licenses,a=void 0===s?[]:s,o=t.subscriptions,c=e.enhancedLicenseType,l=e.selectedProductLicenseType,u=e.selectedPaymentPlan,d=void 0===o?[]:o;if(null==u?void 0:u.isOneTimePurchase)return!0;var m=(0,i.V)({licenses:a,selectedProductLicenseType:l});return(null==l?void 0:l.license)===c&&(d=d.filter(function(e){var n=e.license,t=e.isEligibleForDownload;return n===c&&t})),!(0,r.Y)({eligibility:{licenses:a,subscriptions:d},selectedProductLicenseType:l})&&!m&&!d.length}},97637:function(e,n,t){t.d(n,{Y:function(){return c}});var i=t(87414),r=t(7819),s=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.subscriptions,t=e.licenseType,i=void 0===t?"":t;return!!(void 0===n?[]:n).filter(function(e){var n=e.isEligibleForDownload,t=e.license;return i===r.HS?t===r.HS&&n:t===r.ur}).length},a=t(65229),o=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";return[r.ur,r.HS].includes(e)},c=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.eligibility,t=void 0===n?{}:n,r=t.licenses,c=t.subscriptions,l=e.selectedProductLicenseType,u=void 0===l?{}:l,d=e.selectedPaymentPlan;return o(null==u?void 0:u.license)&&!(0,i.XD)({name:null==u?void 0:u.name})&&!(0,i.OG)({product:d})&&!(0,a.R)({licenses:void 0===r?[]:r,licenseType:null==u?void 0:u.license})&&!s({subscriptions:void 0===c?[]:c,licenseType:null==u?void 0:u.license})}},68769:function(e,n,t){t.d(n,{RO:function(){return j},Ch:function(){return O},It:function(){return k},Rc:function(){return I},Ux:function(){return T},kn:function(){return N},oE:function(){return _}});var i,r=t(47842),s=t(70865),a=t(96670),o=t(87394),c=t(50930),l=t(19522),u=t(8149),d=t(65537),m="kilobyte",f="megabyte",p="gigabyte",v="inch",h="centimeter",y=t(65532),b=t(37546),g=t(44297),P=t(2784),S=t(82603),w=function(){var e,n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";return null===(e=n.toString().match(/[0-9.,]+/))||void 0===e?void 0:e[0]},L=(i={},(0,r.Z)(i,d.xn,{suffix:"px",widthKey:"width",heightKey:"height"}),(0,r.Z)(i,d.tS,{suffix:"in",widthKey:"widthIn",heightKey:"heightIn"}),(0,r.Z)(i,d.IC,{suffix:"cm",widthKey:"widthCm",heightKey:"heightCm"}),i),T=function(e){var n=(0,y.PE)().fullLocale;return new Intl.NumberFormat(n,e).format},_=function(e){var n=e.unit,t=e.maximumFractionDigits,i=(0,o.Z)((0,P.useState)(""),2),r=i[0],s=i[1],a=(0,y.PE)().fullLocale,c=(0,P.useMemo)(function(){try{return new Intl.NumberFormat(a,{style:"unit",unit:n,maximumFractionDigits:t})}catch(e){return s(e),{format:function(e){return e}}}},[a,t,n]);return(0,P.useMemo)(function(){return{format:c.format,error:r}},[c.format,r])},C=function(e){var n=e.humanReadableSize,t=e.size,i=e.name;return n||"".concat(t.toFixed(1)," ").concat(i)},F=function(e){var n=e.formatter,t=e.humanReadableSize,i=e.size,r=e.name,s=n.error,a=n.format;return s?C({humanReadableSize:t,size:i,name:r}):a(i)},x=function(e){var n=e.bytes,t=e.gbFormatter,i=e.mbFormatter,r=e.kbFormatter,s=e.humanReadableSize,a=n/1e3,o=a/1e3,c=o/1e3;return c>=1?F({formatter:t,humanReadableSize:s,size:c,name:"GB"}):o>=1?F({formatter:i,humanReadableSize:s,size:o,name:"MB"}):F({formatter:r,humanReadableSize:s,size:a,name:"KB"})},z=function(e,n,t){var i=L[e]||{},r=i.suffix,s=i.widthKey,a=i.heightKey,c=t[e],l=(0,o.Z)([n[s],n[a]].map(function(e){return e&&Number(w(e))}),2),u=l[0],d=l[1],m=!Number.isNaN(u)&&u>0,f=!Number.isNaN(d)&&d>0;return m||f?{formattedWidth:m?F({formatter:c,size:u,name:r}):"",formattedHeight:f?F({formatter:c,size:d,name:r}):""}:{}},Z=function(e){var n=e.assetSize,t=e.kbFormatter,i=e.mbFormatter,r=e.gbFormatter,s=n.sizeInBytes,a=n.humanReadableSize,o=n.fileSize;return s||o||a?x({bytes:s||1e3*o,gbFormatter:r,mbFormatter:i,kbFormatter:t,humanReadableSize:a}):""},I=function(e){return Z({assetSize:e.assetSize,kbFormatter:_({unit:m,maximumFractionDigits:0}),mbFormatter:_({unit:f,maximumFractionDigits:1}),gbFormatter:_({unit:p,maximumFractionDigits:1})})},D=function(e){var n=e.formattedWidth,t=e.formattedHeight;return"".concat(w(n)," \xd7 ").concat(t)},A=function(e){var n,t=e.assetSize,i=e.displayUnits,s=e.inchFormatter,a=e.centimeterFormatter,o=e.labels,c=void 0===o?{}:o,l=z(i,t,(n={},(0,r.Z)(n,d.tS,s),(0,r.Z)(n,d.IC,a),(0,r.Z)(n,d.xn,{format:function(e){return c.pixels?"".concat(e," ").concat(c.pixels):"".concat(e," ").concat(L[d.xn].suffix)}}),n)),u=l.formattedWidth,m=l.formattedHeight;return u||m?D({formattedWidth:u,formattedHeight:m}):""},E=function(e){return A(e)||A((0,a.Z)((0,s.Z)({},e),{displayUnits:d.xn}))},B=function(e){var n=e.displayUnits,t=e.assetSize,i=e.inchFormatter,r=e.centimeterFormatter,s=e.labels;return n===d.xn?E({assetSize:t,displayUnits:d.tS,inchFormatter:i,centimeterFormatter:r,labels:s}):E({assetSize:t,displayUnits:n,inchFormatter:i,centimeterFormatter:r,labels:s})},k=function(e){var n=e.isImageAsset,t=e.assetSize,i=e.labels,s=(0,S.n)(),a=_({unit:v,maximumFractionDigits:0}),o=_({unit:h,maximumFractionDigits:0}),c=E({assetSize:t,displayUnits:d.xn,inchFormatter:a,centimeterFormatter:o,labels:i}),l=(0,r.Z)({},d.xn,c);return n&&(l.formattedDimensions=B({assetSize:t,labels:i,displayUnits:s,inchFormatter:a,centimeterFormatter:o})),l},N=function(){var e=(0,S.n)(),n=_({unit:m,maximumFractionDigits:0}),t=_({unit:f,maximumFractionDigits:1}),i=_({unit:p,maximumFractionDigits:1}),r=_({unit:v,maximumFractionDigits:0}),s=_({unit:h,maximumFractionDigits:0});return(0,P.useCallback)(function(a){var o=a.assetSize,c=Z({assetSize:o,kbFormatter:n,mbFormatter:t,gbFormatter:i}),l=E({assetSize:o,displayUnits:e,inchFormatter:r,centimeterFormatter:s});return c?{resolutionDetails:l,size:c}:{resolutionDetails:l}},[s,e,r,i,t,n])},M=function(e){var n,t=e.assetSize,i=e.centimeterFormatter,r=e.displayUnits,s=e.inchFormatter,a=e.isImageAsset,o=e.labels,l=e.isVideoAsset,m=e.isDesignAsset,f=t.format,p=t.dpi,v=t.name,h=t.resolution,y=(null==f?void 0:f.toUpperCase())||"";if(v===u.gf)return y;var b=E({assetSize:t,PIXELS:d.xn,inchFormatter:s,centimeterFormatter:i,labels:o});return n=(a||m)&&p?[b,B({assetSize:t,labels:o,displayUnits:r,inchFormatter:s,centimeterFormatter:i}),"".concat(o.dpi," ").concat(p),y]:l?[o[null==h?void 0:h.toLowerCase()]||"",b,y]:[b,y],(0,c.Z)(new Set(n)).filter(function(e){return!!e}).join(" • ")},j=function(e){var n=e.sizes;return(void 0===n?[]:n).filter(function(e){return e.format!==l.LX})},H=function(e){var n=e.limit,t=void 0===n?0:n,i=e.sortedSizes;return t>0?null==i?void 0:i.slice(0,t):i},O=function(){var e=(0,S.n)(),n=_({unit:v,maximumFractionDigits:1}),t=_({unit:h,maximumFractionDigits:1});return(0,P.useCallback)(function(i){var r=i.asset,s=i.labels,a=i.limit,o=(0,g.aT)(r),c=(0,g.Am)(r),l=(0,g.ML)(r),u=o||l?j({sizes:Object.values(r.sizes||{})}):r.sizes,d=H({limit:void 0===a?0:a,sortedSizes:o||l?(0,b.hQ)(Object.values(u)):(0,b.Z)({sizes:u})});return{formattedSizes:null==d?void 0:d.map(function(i){return M({assetSize:i,centimeterFormatter:t,displayUnits:e,inchFormatter:n,isImageAsset:o,isDesignAsset:l,labels:s,isVideoAsset:c})})}},[e,t,n])}}}]);
//# sourceMappingURL=93792-024db82a07354137.js.map