"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[80837],{15454:function(e,n,t){t.d(n,{p:function(){return s}});var o=t(25237),s=t.n(o)()(function(){return Promise.all([t.e(27310),t.e(10934),t.e(90964),t.e(30602)]).then(t.bind(t,90964)).then(function(e){return e.AddToCartSnackbar})},{loadableGenerated:{webpack:function(){return[90964]}},ssr:!1})},80837:function(e,n,t){t.d(n,{i:function(){return E}});var o=t(47842),s=t(70865),i=t(96670),a=t(52322),r=t(68052),l=t(79441),d=t(11164),c=t(86669),u=t(54112),h=t(94909),f=t(73377),v=t(32545),w=t(25237),g=t.n(w),b=t(2784),p=t(98116),A=t(15454),S=t(46159),L=t(685),m=t(18731),y=(0,b.createContext)({}),B=function(e){var n=e.monitoringOrigin,t=(0,b.useContext)(y),o=t.color,s=t.shouldUseIcon,i=t.variant;return(0,a.jsx)(S.F,{color:o,shouldUseIcon:s,variant:i,width:L.G,monitoringOrigin:n})},C=g()(function(){return Promise.all([t.e(15873),t.e(92549),t.e(61640),t.e(22486),t.e(67601),t.e(25634),t.e(10208)]).then(t.bind(t,12229)).then(function(e){return e.OpenLicenseDrawerButton})},{loadableGenerated:{webpack:function(){return[12229]}},ssr:!1,loading:function(){return(0,a.jsx)(B,{monitoringOrigin:"LicenseDrawerDownloadButton LoadingButtonFallback"})}}),T=function(e){var n=e.eligibility,t=e.asset,o=e.canOpenDrawerOnLoad,i=e.clickAnalyticsLabel,r=e.clickTrackOptions,l=e.label,d=e.addToCartSuccessHandler,c=e.color,u=e.variant,h=e.showIcon,f=e.disabled;return(0,a.jsx)(m.l,{allSizesAssetEligibility:n,asset:t,children:(0,a.jsx)(C,(0,s.Z)({clickAnalyticsLabel:i,label:l,onAddToCartSuccess:d,color:c,variant:u,shouldUseDownloadIcon:h,disabled:f,canOpenDrawerOnLoad:o},r))})},k=t(98202),O=g()(function(){return t.e(43299).then(t.bind(t,43299)).then(function(e){return e.DownloadButton})},{loadableGenerated:{webpack:function(){return[43299]}},ssr:!0}),x=g()(function(){return Promise.all([t.e(61668),t.e(68439)]).then(t.bind(t,68439)).then(function(e){return e.AddToCartButton})},{loadableGenerated:{webpack:function(){return[68439]}},ssr:!1,loading:function(){return(0,a.jsx)(B,{monitoringOrigin:"AddToCartButton LoadingButtonFallback"})}}),I=(0,p.ZL)()(function(e,n){var t=e.breakpoints,s=n.iconBreakpoint;return{root:(0,o.Z)({minWidth:150},t.down(s),{minWidth:0})}}),D={download:"common:actions_download",downloadForFree:"image:logout_adp_free_trial_download",redownload:"common:actions_redownload"},E=function(e){var n=e.asset,t=e.assetSize,o=e.clickAnalyticsLabels,w=e.canOpenDrawerOnLoad,g=e.color,p=e.iconBreakpoint,m=e.hideCtaComponent,B=e.variant,C=e.isScrollCTABar,E=e.hideConditionsAreLoading,F=e.isInsideAssetDetails,_=e.disabled,P=e.isOverlay,U=I({iconBreakpoint:p}).classes,z=(0,u.D)({namespace:r.Otp,translationKeys:D}).labels,Z=(0,d.m)(),j=(0,b.useCallback)(function(e){var n=e.hasExistingLicense?o.redownloadButton:o.downloadButton;return(0,f.U_)(n)},[o.downloadButton,o.redownloadButton]),N=(0,v.iP)(null==n?void 0:n.holding),R=(0,k.A)({asset:n,clickAnalyticsLabels:o,labels:z,assetIsLicensed:N,hideCtaComponent:m,shouldFetchEligibility:!N}),V=R.addToCartFailureHandler,G=R.addToCartStatus,H=R.addToCartSuccessHandler,W=R.closeAddToCartSnackbarHandler,K=R.downloadButtonClickAnalyticsLabel,M=R.downloadButtonLabel,X=R.eligibility,Y=R.hasExistingLicense,q=R.shouldShowAddToCartButton,J=R.shouldShowDownloadButton,Q=R.shouldShowOpenLicenseDrawerButton,$=R.shouldShowButtonLoadingPlaceholder,ee=(0,l.L)({asset:n,isInsideAssetDetails:F}).showLoggedOutConversionPanel,en=(0,h.d)({breakpoint:p}),et=(null==Z?void 0:Z.insightType)?{clickTrackOptions:{insightType:Z.insightType}}:{};return(0,a.jsx)("div",{className:U.root,children:$&&!J||E?(0,a.jsx)(S.F,{color:g,shouldUseIcon:en,variant:B,width:L.G,monitoringOrigin:"AssetDownloadCTA-".concat(null==n?void 0:n.type)}):(0,a.jsxs)(y.Provider,{value:{color:g,shouldUseIcon:en,variant:B},children:[J&&(C||!ee)&&(0,a.jsx)(O,(0,i.Z)((0,s.Z)({asset:n,clickAnalyticsLabel:(0,f.U_)(K)},et),{label:M,color:g,variant:B,shouldUseDownloadIcon:en,isOverlay:P})),Q&&(0,a.jsx)(T,{eligibility:X,asset:n,canOpenDrawerOnLoad:w,clickAnalyticsLabel:j({hasExistingLicense:Y}),clickTrackOptions:et,label:Y?z.redownload:z.download,addToCartSuccessHandler:H,color:g,variant:B,showIcon:en,disabled:_}),q&&(0,a.jsx)(x,(0,s.Z)({asset:n,itemsToAdd:[(0,c.zg)({asset:n,assetSize:t})],onAddToCartSuccess:H,onAddToCartFailure:V,color:g,variant:B,shouldUseIcon:en,clickAnalyticsLabel:(0,f.U_)(o.addToCartButton)},et)),!!G.status&&(0,a.jsx)(A.p,{alertSeverity:G.status,onCloseSnackbar:W,error:G.error})]})})};E.defaultProps={asset:{},clickAnalyticsLabels:{},iconBreakpoint:null,hideCtaComponent:!1,disabled:!1,isInsideAssetDetails:!0,isOverlay:!1}},685:function(e,n,t){t.d(n,{G:function(){return o},r:function(){return s}});var o=70,s="showDrawerOnLoad"},98202:function(e,n,t){t.d(n,{A:function(){return L}});var o=t(47842),s=t(87394),i=t(44699),a=t(8149),r=t(44297),l=t(37443),d=t(95775),c=t(70008),u=t(59004),h=t(12649),f=t(62767),v=t(2784),w=t(70865),g=function(e){var n=e.clickAnalyticsLabels,t=e.hasExistingLicense,o=e.isOffsetAsset,s=e.isLoggedInUser,i=e.labels,a=e.override;return(0,w.Z)({downloadButtonClickAnalyticsLabel:n.downloadButton,downloadButtonLabel:i.download,shouldShowDownloadButton:!s&&!o,shouldShowAddToCartButton:!!o&&!t,shouldShowOpenLicenseDrawerButton:s&&!o||s&&o&&t},null==a?void 0:a())},b=function(e){var n=e.isFootageSelect,t=e.isLoggedInUser,o=e.isLoggedInWithoutPlan;return{shouldShowAddToCartButton:!t||o||n,shouldShowDownloadButton:!1,shouldShowOpenLicenseDrawerButton:e.isLoggedInWithPlan&&!n}},p=function(e){var n=e.clickAnalyticsLabels,t=e.hasVideoRenderUrl,o=e.labels;return{downloadButtonClickAnalyticsLabel:n.downloadButton,downloadButtonLabel:o.download,shouldShowAddToCartButton:!1,shouldShowDownloadButton:t,shouldShowOpenLicenseDrawerButton:!1}},A=function(e){var n,t=e.assetType,o=e.clickAnalyticsLabels,s=e.hasExistingLicense,i=e.hasExistingSubscription,r=e.isFootageSelect,l=e.isLoggedInUser,d=e.isOffsetAsset,c=e.isRexEditorialAsset,u=e.hasVideoRenderUrl,h=e.labels,f=e.overrides,v=i||s,w=l&&!v,A=l&&v;switch(t){case a.k4:n=g({clickAnalyticsLabels:o,hasExistingLicense:s,hasPlan:v,isLoggedInUser:l,isOffsetAsset:d,isRexEditorialAsset:c,labels:h,override:f[a.k4]});break;case a.pX:n=b({isFootageSelect:r,isLoggedInUser:l,isLoggedInWithoutPlan:w,isLoggedInWithPlan:A});break;case a.bz:n=p({clickAnalyticsLabels:o,hasVideoRenderUrl:u,labels:h});break;case a.xF:case a.tn:default:n={shouldShowAddToCartButton:!l||w||r,shouldShowDownloadButton:!1,shouldShowOpenLicenseDrawerButton:A&&!r}}return t===a.pX&&c?{shouldShowAddToCartButton:!s,shouldShowDownloadButton:!1,shouldShowOpenLicenseDrawerButton:s}:n},S=function(e){var n=e.isLoggedInUser,t=e.shouldFetchEligibility,o=e.hasActiveSubscriptionForAssetType,s=e.assetType,i=e.isFootageSelect,r=e.isOffsetAsset,l=!i&&(r&&s===a.k4||s===a.pX||s===a.xF||s===a.tn);return!!(n&&t&&(!1===o||r)&&l)},L=function(e){var n,t,w=e.asset,g=e.clickAnalyticsLabels,b=e.hideCtaComponent,p=void 0!==b&&b,L=e.labels,m=e.shouldFetchEligibility,y=e.assetIsLicensed,B=w.isFootageSelect,C=(0,r.Tp)(w),T=(0,r.PD)(w),k=(0,r.EK)(w),O=(0,h.B)(),x=(0,c.B)().isIndiaRegion,I=(0,f.DJ)(),D=I.data,E=I.error,F=(0,l.l)({subscriptions:D,assetType:C,isRexEditorialAsset:k}),_=S({isLoggedInUser:O,shouldFetchEligibility:void 0===m||m,hasActiveSubscriptionForAssetType:F,assetType:C,isFootageSelect:B,isOffsetAsset:T}),P=(0,d.IP)({assets:[w],shouldFetch:_}),U=P.data,z=P.error,Z=(0,s.Z)((0,v.useState)({status:"",error:void 0}),2),j=Z[0],N=Z[1],R=void 0!==y&&y||!!(null==U?void 0:null===(n=U.licenses)||void 0===n?void 0:n.length),V=!!(null==U?void 0:null===(t=U.subscriptions)||void 0===t?void 0:t.length)||F,G=!!w.videoRenderUrl,H=A({assetType:C,clickAnalyticsLabels:void 0===g?{}:g,hasExistingLicense:R,hasExistingSubscription:V,isFootageSelect:B,isLoggedInUser:O,isOffsetAsset:T,isRexEditorialAsset:k,hasVideoRenderUrl:G,labels:void 0===L?{}:L,overrides:(0,o.Z)({},a.k4,function(){return!x||O||k||T?p&&T?{shouldShowAddToCartButton:!1}:{}:{shouldShowDownloadButton:!1,shouldShowOpenLicenseDrawerButton:!0}})}),W=H.shouldShowDownloadButton,K=H.shouldShowOpenLicenseDrawerButton,M=H.shouldShowAddToCartButton,X=H.downloadButtonClickAnalyticsLabel,Y=H.downloadButtonLabel,q=(0,v.useCallback)(function(){return N({status:i.MR,error:void 0})},[]),J=(0,v.useCallback)(function(e){return N({status:i.cM,error:e})},[]),Q=(0,v.useCallback)(function(){return N({status:"",error:void 0})},[]);return(0,u.L)({customAttributes:{actionText:Y||"",component:"useAssetDownloadCta.js",downloadButtonClickAnalyticsLabel:X,hasExistingLicense:R,hasExistingSubscription:V,hasVideoRenderUrl:G,isFootageSelect:B,isLoggedInUser:O,isOffsetAsset:T,isRexEditorialAsset:k,shouldShowAddToCartButton:M,shouldShowDownloadButton:W,shouldShowOpenLicenseDrawerButton:K},error:z||E,level:z?"error":E?"warn":"",msg:E?"FREN-361 Failed to fetch subscriptions":"render useAssetDownloadCta"}),{addToCartFailureHandler:J,addToCartStatus:j,addToCartSuccessHandler:q,closeAddToCartSnackbarHandler:Q,downloadButtonClickAnalyticsLabel:X,downloadButtonLabel:Y,eligibility:U,hasExistingLicense:R,shouldShowAddToCartButton:M,shouldShowButtonLoadingPlaceholder:!1,shouldShowDownloadButton:W,shouldShowOpenLicenseDrawerButton:K}}},46159:function(e,n,t){t.d(n,{F:function(){return u}});var o=t(52322),s=t(81066),i=t(72841),a=t(85801),r=t(21647),l=t(40233),d=t(2784),c=(0,t(98116).ZL)()(function(e){var n=e.palette;return{secondary:{"&:disabled":{backgroundColor:n.secondary.main}},"skeleton-secondary":{backgroundColor:n.secondary.dark}}}),u=function(e){var n=e.color,t=e.classesProps,u=e.shouldUseIcon,h=e.shouldUseIconWithLabelBelow,f=e.monitoringOrigin,v=e.variant,w=e.width,g=c().classes,b=(0,l.d)();return((0,d.useEffect)(function(){var e=setTimeout(function(){b({actionName:"FREN-331: ButtonLoadingPlaceholder timeout - ".concat(f)})},1e4);return function(){return clearTimeout(e)}},[]),h)?(0,o.jsx)(s.Z,{className:t.addToCartButton,disabled:!0,variant:"text",size:"large",children:(0,o.jsx)(i.Z,{color:"inherit",size:24})}):u||h?(0,o.jsx)(a.Z,{disabled:!0,size:"large",children:(0,o.jsx)(i.Z,{color:"inherit",size:24})}):(0,o.jsx)(s.Z,{"aria-label":"Loading",classes:{root:g[n]},variant:v,fullWidth:!0,disabled:!0,children:(0,o.jsx)(r.Z,{variant:"text",width:w,classes:{root:g["skeleton-".concat(n)]}})})};u.defaultProps={color:"secondary",shouldUseIcon:!1,shouldUseIconWithLabelBelow:!1,monitoringOrigin:"",variant:"contained",width:"100%"}},79441:function(e,n,t){t.d(n,{L:function(){return c}});var o=t(65532),s=t(27203),i=t(44297),a=t(70008),r=t(94909),l=t(12649),d=t(62767),c=function(e){var n=e.asset,t=e.isInsideAssetDetails,c=(0,l.B)(),u=(0,s.f)().show2019Rewind,h=(0,i.aT)(n)&&!(0,i.N3)(n)&&(!(0,i.f8)(n)||(0,i.f8)(n)&&u)&&!(0,i.PD)({channels:null==n?void 0:n.channels}),f=(0,r.d)(),v=(0,a.B)().isIndiaRegion,w="en"===(0,o.PE)().locale,g=(0,d.V9)().data,b=(void 0===g?{}:g).totalNumSubscriptionsActive;return{showLoggedOutConversionPanel:!c&&h&&!f&&!v&&(w||u&&!w)&&(void 0===t||t),showLoggedInConversionPanel:c&&h&&!f&&!v&&(w||u&&!w)&&0===b}}},19928:function(e,n,t){t.d(n,{w:function(){return o}});var o=(0,t(2784).createContext)({})},18731:function(e,n,t){t.d(n,{l:function(){return a}});var o=t(52322),s=t(2784),i=t(19928),a=function(e){var n=e.allSizesAssetEligibility,t=e.asset,a=e.children;return(0,o.jsx)(i.w.Provider,{value:(0,s.useMemo)(function(){return{allSizesAssetEligibility:n,asset:t}},[n,t]),children:a})};a.defaultProps={allSizesAssetEligibility:{},asset:{}}},27203:function(e,n,t){t.d(n,{f:function(){return i},z:function(){return s}});var o=t(2784),s=(0,o.createContext)({show2019Rewind:!1}),i=function(){return(0,o.useContext)(s)}},86669:function(e,n,t){t.d(n,{pd:function(){return A},Kw:function(){return S},zg:function(){return L},pl:function(){return w}});var o=t(47842),s=t(70865),i="cart-items",a=t(98217),r=t(27739),l=t(56495),d=t(8149),c=t(12969),u=t(37546),h=t(44297),f=t(18411),v=f.Oy.SSTK_TO_LEGACY;f.Oy.LEGACY_TO_SSTK;var w=function(e){var n,t=e.cartData,o=e.asset,s=e.licenseType,i=void 0===s?null:s;return null==t?void 0:null===(n=t.items)||void 0===n?void 0:n.find(function(e){var n,t,s=(null==e?void 0:null===(n=e.mediaItem)||void 0===n?void 0:n.id)===(null==o?void 0:o.id);return i?s&&(null==e?void 0:null===(t=e.product)||void 0===t?void 0:t.license)===i:s})},g=function(e){var n=e.license,t=e.type,o=e.isVideoAsset;return e.isOffsetAsset&&!n?r.WN:n||o?n:t===d.tn?l.bK:a.X},b=function(e){var n=e.isVideoAsset,t=e.size,o=e.isFootageSelect,s=e.isOffsetAsset;if(n){var i=t.resolution;return o?"select":v[i]||i.toLowerCase()}if(s)return"offset"},p=function(e){var n=(0,h.Am)(e),t=e.id,a=e.size,r=e.isFootageSelect,l=e.type,d=e.license,c=e.isOffsetAsset,u={type:i,relationships:{"media-item":{data:{id:c?t.toString():t,type:l}}}},f=b({isVideoAsset:n,size:a,isFootageSelect:r,isOffsetAsset:c}),v=g({type:l,license:d,isVideoAsset:n,isOffsetAsset:c});return u.meta=(0,o.Z)({},"legacy_cart",(0,o.Z)({},"cart",(0,s.Z)({},v?{license:v}:{},f?{size:f}:{}))),u},A=function(e){var n=e.items;return null==n?void 0:n.map(function(e){return p(e)})},S=function(e){var n=e.items;return null==n?void 0:n.map(function(e){return{type:i,id:e.id}})},L=function(e){var n=e.asset,t=e.assetSize,o=e.license,s=n.id,i=n.type,a=n.isFootageSelect,r=(0,h.PD)(n),l=(0,h.EK)(n),f=(0,h.Tp)(n),v=t;return t||f===d.xF||f===d.tn||f===d.bz||(v=(0,h.Tp)(n)===d.pX?(0,u.kS)(Object.values(n.sizes))[0]:(0,c.M)({asset:n})),{id:s,type:i,isOffsetAsset:r,isFootageSelect:a,isRexEditorialAsset:l,size:v,license:o}}},37443:function(e,n,t){t.d(n,{l:function(){return a}});var o=t(56495),s=t(8149),i=t(24861),a=function(e){var n=e.subscriptions,t=e.assetType;return null==n?void 0:n.some(function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=e.product,a=void 0===n?{status:"",businessUnit:"",name:""}:n,r=a.status,l=a.businessUnit,d=a.name;return r===i.PP&&(t===s.tn?o.LY.includes(d):l===t||"none"===l)})}},95775:function(e,n,t){t.d(n,{IP:function(){return m},jC:function(){return L}});var o=t(70865),s=t(50930),i=t(81740),a=t(19522),r=t(8149),l=t(94054),d=t(7819),c=t(61765),u=t(44297),h=t(18411),f=t(12649),v=t(37121),w=t(49670),g=t(9009),b=t(81232),p=t(44750),A=function(e){var n=e.assetTypeFromAsset,t=e.licenseName,s=e.selectedAssetSize;switch(n){case r.pX:return(0,o.Z)({},(null==s?void 0:s.name)&&{content_size:h.Oy.SSTK_TO_LEGACY_ELIGIBILTY[s.name]||s.name});case r.j0:case r.xF:return{content_format:r.j0};case r.tn:return{content_format:a._Y};default:return(0,o.Z)({},(null==s?void 0:s.name)&&{content_size:h.nd[(0,b.z)(s.name)].downloadName},(null==s?void 0:s.format)&&{content_format:s.format},t===d.HS&&{license_name:d.HS},(t===l.sVc||n===r.gP)&&{license_name:l.sVc})}},S=function(e){var n=e.assets,t=e.include,s=e.licenseName,i=e.selectedAssetSize,a=n[0],r=(0,u._L)(a),l={},d=(0,u.f8)(a);(null==n?void 0:n.length)>=2?l.content_ids=n.filter(function(e){return!!e.id}).join(","):l.content_id=null==a?void 0:a.id;var h=A({assetTypeFromAsset:r,licenseName:s,selectedAssetSize:i});return(0,o.Z)({include:void 0===t?"subscriptions,licenses,licenses.product,subscriptions.product":t,content_type:(0,c.JD)({assetType:r,assetId:null==a?void 0:a.id})},h,d&&{content_provider:"pixelsquid-media"},l)},L=function(e){var n=e.licenseeIdentifier,t=e.assets,o=e.licenseName,s=e.selectedAssetSize;return(0,i.Td)({urlParams:{licenseeIdentifier:n},queryParams:S({assets:t,licenseName:o,selectedAssetSize:s})}).formattedUrl},m=function(e){var n,t=e.assets,o=e.licenseeIdentifier,i=void 0===o?l.RU_:o,a=e.licenseName,r=e.selectedAssetSize,d=e.shouldFetch,c=(0,f.B)(),h=(0,u.vh)(null===(n=t[0])||void 0===n?void 0:n.type),b=(0,v.O)({defaultTosStatus:!1}).tosStatus,A=L({licenseeIdentifier:i,assets:t,licenseName:a,selectedAssetSize:r}),S=(0,p.a)({enabled:(void 0===d||d)&&c&&!h&&b,queryKey:["eligibility"].concat((0,s.Z)(t.map(function(e){return e.id})),[r]),queryFn:function(){return w.uS.get(A,{headers:{credentials:"include"}}).then(function(e){return(0,g.O)(e.data)})}});return{data:S.data,isLoading:S.isLoading,error:S.error}}},59004:function(e,n,t){t.d(n,{L:function(){return u}});var o=t(70865),s=t(96670),i=t(23490),a=t(776),r=t(21805),l=t(2784),d=t(12649),c=t(25936),u=function(e){var n=e.customAttributes,t=void 0===n?{}:n,u=e.error,h=e.level,f=void 0===h?"error":h,v=e.msg,w=(0,d.jy)().data,g=(0,c.u)().data,b=(0,a.yh)().analytics,p=r.Z.get("n_v"),A=(0,i.N)(),S=A.isGoodBot,L=A.isSuspectedBadBot;(0,l.useEffect)(function(){if(w&&g){var e,n,i,a,r,l=u||Error(v),d="function"==typeof l.toJSON?null===(e=l.toJSON)||void 0===e?void 0:e.call(l):{},c=(0,s.Z)((0,o.Z)({},t,d),{clientVersion:p,errorCode:l.code,errorStatus:l.status,errorDetail:l.detail,errorMessage:l.message,errorStack:l.stack||"useNewRelicNoticeError",errorTitle:l.title,createTime:w.createTime,impersonatorId:g.impersonatorId,isGoodBot:S,isSuspectedBadBot:L,msg:v,organizationId:w.organizationId,path:window.location.pathname,referrerPath:window.location.pathname,query:window.location.search,referrerQuery:window.location.search,userId:w.id,username:w.username});"error"===f?(null===(n=window.NREUM)||void 0===n||null===(i=n.noticeError)||void 0===i||i.call(n,l,c),b.click({name:t.component,eventAction:t.eventAction||"seeError",eventCategory:f,eventLabel:"error-experience",eventValue:t.actionText}),window.origin.includes("localhost")&&console.warn("sent newrelic noticeError",c)):"warn"===f&&(null===(a=window.NREUM)||void 0===a||null===(r=a.addPageAction)||void 0===r||r.call(a,l.message,(0,s.Z)((0,o.Z)({},c),{warning:!0})),window.origin.includes("localhost")&&console.log("sent newrelic addPageAction",c))}},[u,g,f,v,w])}}}]);
//# sourceMappingURL=80837-a3384ffecc3bb8d6.js.map