"use strict";(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[72474],{72474:function(e,t,n){n.d(t,{B:function(){return ei}});var r=n(87394),i=n(52322),o=n(68052),a=n(16642),c=n(71162),s=n(61140),u=n(8149),l=n(84833),d=n(76279),p=n(65532),g=n(19799),f=n(44297),m=n(48417),v=n(89522),h=n(31037),y=n(57858),x=n(27764),k=n(61970),j=n(70314),S=n.n(j),T=n(5632),w=n(2784),E=n(31294),I=n(9823),O=[d.Z$,d.Tv],_=[d.oy,d.G4,d.in,d.gG],L=[u.w5,u.pV,u.e3],A=S()().publicRuntimeConfig,b=A.enterpriseBaseUrl,P=A.shutterstockBaseUrl,C=A.premiumBeatBaseUrl,R=/\/search(\?|\/).+$/,B=/^\/search(.+)?$/,N=/\/editorial\/(?:video\/)?search\/.+$/,Z=/\/video\/editorial\/?search/,F=/\/music\/search\/ras\/.+$/,D=/\/music\/search(\?|\/).+$/,G=/\/video\/embed\/\d+$/,H=/.*\/edit$/,M=function(e){return R.test(e)&&!(N.test(e)||F.test(e))},U=RegExp("^/editorial/(".concat(l.Nm.join("|"),")/")),q=function(e,t,n,i){if(!t)return o;var o,a=(0,k.jq)(t).query,c=D.test(t)&&!(N.test(t)||F.test(t)),s=Object.entries(a).reduce(function(e,o){var a=(0,r.Z)(o,2),s=a[0],u=a[1];if(c&&_.includes(s)&&(e.push([s,Array.isArray(u)?u[0]:u]),c=!1),O.includes(s)&&!Array.isArray(u)){if(s===d.Tv&&L.includes(u))return e;e.push([s,u])}return B.test((0,x.oY)(t))&&s===d.jS&&!n&&i&&e.push([s,u]),e},[]);if(s&&!s.length)return o;var u=Object.fromEntries(s.sort());return(0,k.BQ)({pathname:e,query:u})},Q=function(){var e=(arguments.length>0&&void 0!==arguments[0]?arguments[0]:{}).asset,t=(0,I.D)().isBrandSstk?P:b,n=(0,T.useRouter)().asPath,i=(0,p.PE)().locale,o=(0,g.ug)(),a=o.query,c=o.spellcheckInfo,s=c.spellcheckedQuery,l=void 0===s?"":s,d=c.origResultsCount,f=(0,E.Q)().encodeSearchTerm,y=(0,r.Z)((0,v.KC)({asset:e}),1)[0];return{getCanonicalLink:(0,w.useCallback)(function(){var o=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},c=o.appendLocale,s=o.code,p=o.isPremiumBeatTrack,g=o.overriddenSearchTerm,v=o.isAlternateLink,j=o.isSEO1640ExperimentActive,S=null!==(L=null===(_=(0,k.jq)((0,x.oY)(n)))||void 0===_?void 0:_.pathname)&&void 0!==L?L:"",T=S;if(w=T,Z.test(w)&&(T=T.replace("video/editorial","editorial/video")),E=T,U.test(E)&&(T=T.replace(U,"/editorial/livefeed/")),"/"!==y&&(I=T,G.test(I))&&(T=y),O=T,H.test(O)&&(T="/"!==y?y:T.replace("/edit","")),M(n)){var w,E,I,O,_,L,A=q(S,n,void 0!==v&&v,void 0!==j&&j);A&&(T=A);var b=(0,m.aT)(g||(0===d&&l?l:a),i),P=(0,k.jq)(n).query;T=P.image_type===u.e3&&P.entity&&""===b?(0,r.Z)((0,h.NJ)(),1)[0]:(0,x.Iz)({path:T,term:f(b)})}return("/templates/search"===T&&(T="/templates"),p)?(T="/royalty-free-tracks/".concat((0,x.Ab)(e.title)),(0,x.ws)(C+T,c&&(s||i))):(0,x.ws)(t+T,c&&(s||i))},[e,n,t,i,y,d,l,a,f])}},V=function(){var e,t,n,r,i=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},o=i.overriddenSearchTerm,a=i.asset,c=i.assets,s=(0,g.ug)(),u=s.query,l=s.queryTranslations,d=Q({asset:a}).getCanonicalLink,m=(0,T.useRouter)().asPath,v=(0,p.PE)().locale,h=(0,E.Q)().encodeSearchTerm,j=(0,f.O)({track:a}),S=["a","b","c","d"].includes(u[0]),w=d({appendLocale:!0,isPremiumBeatTrack:j,overriddenSearchTerm:o,isSEO1640ExperimentActive:S}),I=M(m),O=!I||"en"===v&&c&&c.length>0?d():"en"!==v&&l.en?d({overriddenSearchTerm:l.en}):void 0,_=y.Ft.map(function(e){if(!l[e]&&v!==e&&I)return null;var t=l[e]||l.en,n=d({code:e,appendLocale:!0,isAlternateLink:!0});return I&&t&&(n=n.replace(/\/search\/[^/?]*/,"/search/".concat(h(t)))),{href:n,hrefLang:e}}).filter(function(e){return!!e});M(m)&&(null===(e=_.find(function(e){return e.hrefLang===v}))||void 0===e?void 0:e.href)!==w&&(_=[]),M(m)&&1===_.length&&_[0].hrefLang===v&&(_=[]);var L=!!(null!==(r=null===(t=(0,k.jq)(w))||void 0===t?void 0:null===(n=t.query)||void 0===n?void 0:n.page)&&void 0!==r?r:"");return B.test((0,x.oY)(m))&&L&&S&&(_=[],O=""),{altDefaultLink:O,altLinks:_,canonicalLink:w}},W=n(97024),$=n(68871),J=n(97729),z=n.n(J),K=n(59877),Y="Shutterstock",X="Shutterstock Editorial",ee=[["twitter:site","@shutterstock"],["twitter:card","summary_large_image"],["apple-itunes-app","app-id=473347409, app-argument=http://www.shutterstock.com/"],["google-site-verification","1wsiFwGziBzqCcMecpMDlbZgN1jKL-Fh6m05QXpg4QY"]],et=function(e){var t=e.isBrandSstk,n=(0,W.Ws)();return t&&n?X:Y},en=function(e){var t=e.metaTitle,n=e.isBrandSstk,r=e.isSEO1637ExperimentEligible,i=(0,W.Ws)()&&n;return r?t:t.includes(Y)?i?t.replace(Y,X):t:"".concat(t," | ").concat(i?X:Y)},er=function(e){var t=e.statusCode,n=(0,K.$G)([o.ocu,o._eB]).t,r=(0,I.D)(),a=r.isBrandSstk,s=r.isBrandEnterprise,u=(0,$.U3)(t)?t:c.Vj,l=n("error:status_".concat(u,"_title")),d=n(s&&t===c.gB?"".concat(o._eB,"::ent:no_access_content"):"error:status_".concat(u,"_subtitle")),p=en({metaTitle:l,isBrandSstk:a});return(0,i.jsxs)(z(),{children:[(0,i.jsx)("title",{children:p},"title"),(0,i.jsx)("meta",{name:"description",content:d},"description"),(0,i.jsx)("meta",{content:p,property:"og:title"},"og:title"),(0,i.jsx)("meta",{content:d,property:"og:description"},"og:description")]})},ei=function(e){var t,n,u,l=e.assets,d=e.description,p=e.image,g=void 0===p?{}:p,f=e.title,m=e.schemas,v=e.statusCode,h=e.noIndex,y=e.noIndexNoFollow,x=e.keywords,k=e.isAdultContent,j=e.contributor,S=void 0===j?{}:j,T=e.children,w=e.seoServiceData,E=e.asset,O=e.pageDescription,_=e.isSEO1637ExperimentEligible,L=(0,K.$G)(o.aGO).t,A=(0,s.a)().autocorrection,b=V({overriddenSearchTerm:(null==w?void 0:w.taxonomyCanonical)||A,asset:E,assets:l}),P=b.altDefaultLink,C=b.altLinks,R=b.canonicalLink,B=(0,I.D)(),N=B.isBrandSstk,Z=B.isBrandEnterprise,F={title:f||L("home:lihp_meta_title"),description:d||L("home:lihp_meta_description")},D=F.title,G=F.description,H=et({isBrandSstk:N}),M=en({metaTitle:D,isBrandSstk:N,isSEO1637ExperimentEligible:_}),U=(null==w?void 0:w.disposition)===a.M8&&(null==w?void 0:w.isSeoServiceActive),q=(null==w?void 0:w.disposition)===a.Hf&&(null==w?void 0:w.isSeoServiceActive),Q=(h||U)&&!Z,W=(y||q)&&!Z,$=(null==w?void 0:w.disposition)===a.FL&&(null==w?void 0:w.canonicalURL)||R;return(0,i.jsxs)(i.Fragment,{children:[v>c.HO?(0,i.jsx)(er,{statusCode:v}):(0,i.jsxs)(z(),{children:[T," ",(0,i.jsx)("title",{children:M},"title"),(0,i.jsx)("meta",{name:"description",content:O||G},"description"),(0,i.jsx)("meta",{content:M,property:"og:title"},"og:title"),(0,i.jsx)("meta",{content:G,property:"og:description"},"og:description")]}),(0,i.jsxs)(z(),{children:[ee.map(function(e){var t=(0,r.Z)(e,2),n=t[0],o=t[1];return(0,i.jsx)("meta",{name:n,content:o},n)}),(0,i.jsx)("meta",{content:"website",property:"og:type"},"type"),(0,i.jsx)("meta",{content:H,property:"og:site_name"},"site"),(0,i.jsx)("meta",{content:"604800",property:"og:ttl"},"og:ttl"),S.twitterUsername&&(0,i.jsx)("meta",{content:"@".concat(S.twitterUsername),name:"twitter:creator"},"twitter:creator"),S.twitterTitle&&(0,i.jsx)("meta",{content:S.twitterTitle,name:"twitter:title"},"twitter:title"),S.twitterDescription&&(0,i.jsx)("meta",{content:S.twitterDescription,name:"twitter:description"},"twitter:description"),g.url&&(0,i.jsx)("meta",{content:g.url,property:"og:image"},"og:image"),g.width&&(0,i.jsx)("meta",{content:Math.round(g.width),property:"og:image:width"},"og:image:width"),g.height&&(0,i.jsx)("meta",{content:Math.round(g.height),property:"og:image:height"},"og:image:height"),(null==g?void 0:null===(t=g.imageSmall)||void 0===t?void 0:t.url)&&(0,i.jsx)("meta",{content:g.imageSmall.url,property:"og:image"},"og:imageSmall"),(null==g?void 0:null===(n=g.imageSmall)||void 0===n?void 0:n.width)&&(0,i.jsx)("meta",{content:Math.round(g.imageSmall.width),property:"og:image:width"},"og:imageSmall:width"),(null==g?void 0:null===(u=g.imageSmall)||void 0===u?void 0:u.height)&&(0,i.jsx)("meta",{content:Math.round(g.imageSmall.height),property:"og:image:height"},"og:imageSmall:height"),g.alt&&(0,i.jsx)("meta",{content:g.alt,property:"og:image:alt"},"og:image:alt"),(null==g?void 0:g.videoUrl)&&(0,i.jsxs)(i.Fragment,{children:[(0,i.jsx)("meta",{content:g.videoUrl,property:"og:video:url"},"og:video:url"),(0,i.jsx)("meta",{content:g.videoUrl,property:"og:video:secure_url"},"og:video:secure_url"),g.width&&(0,i.jsx)("meta",{content:g.width,property:"og:video:width"},"og:video:width"),g.height&&(0,i.jsx)("meta",{content:g.height,property:"og:video:height"},"og:video:height"),(0,i.jsx)("meta",{content:g.videoUrl,property:"twitter:player"},"twitter:player")]}),$&&(0,i.jsx)("meta",{content:$,property:"og:url"},"og:url"),k?(0,i.jsx)("meta",{name:"rating",content:"adult"}):null,m&&m.map(function(e){var t=e.type,n=e.contentType,r=e.innerHTML;return(0,i.jsx)("script",{type:t,dangerouslySetInnerHTML:{__html:r}},n)}),$&&(0,i.jsx)("link",{rel:"canonical",href:$}),(null==w?void 0:w.seo1830HrefLang)&&(0,i.jsx)("link",{rel:"alternate",href:null==w?void 0:w.seo1830Href,hrefLang:null==w?void 0:w.seo1830HrefLang}),C&&C.filter(function(e){return null==w||!w.seo1830HrefLang||"en"!==e.hrefLang}).map(function(e){var t=e.href,n=e.hrefLang;return(0,i.jsx)("link",{rel:"alternate",href:t,hrefLang:n},n)}),P&&!(null==w?void 0:w.seo1830HrefLang)&&(0,i.jsx)("link",{rel:"alternate",href:P,hrefLang:"x-default"}),!!(null==x?void 0:x.length)&&(0,i.jsx)("meta",{name:"keywords",content:x.join(", ")}),W||Q?(0,i.jsxs)(i.Fragment,{children:[(0,i.jsx)("meta",{name:"robots",content:"noindex".concat(W?",nofollow":"")},"robots"),(0,i.jsx)("meta",{name:"googlebot",content:"noindex".concat(W?",nofollow":"")},"googlebot")]}):null,Q||W||Z?null:(0,i.jsx)("meta",{name:"robots",content:"max-image-preview:large"})]})]})};ei.defaultProps={description:void 0,image:{},title:void 0,schemas:void 0,statusCode:void 0,noIndex:!1,noIndexNoFollow:!1,keywords:[],contributor:{},isAdultContent:!1,children:void 0,seoServiceData:{},asset:void 0,assets:[],pageDescription:void 0,isSEO1637ExperimentEligible:!1}},16642:function(e,t,n){n.d(t,{FL:function(){return s},H2:function(){return o},Hf:function(){return c},M8:function(){return a},Rm:function(){return i},ke:function(){return r}});var r="https://schema.org",i={IMAGE_OBJECT:"ImageObject",VIDEO_OBJECT:"VideoObject",AUDIO_OBJECT:"AudioObject",MUSIC_GROUP:"MusicGroup",MUSIC_RECORDING:"MusicRecording",PRODUCT:"Product",OFFER:"Offer",ORGANIZATION:"Organization",PERSON:"Person",THING:"Thing",SEARCH_ACTION:"SearchAction",WEB_SITE:"WebSite",BREADCRUMBSLIST:"BreadcrumbList",FAQPAGE:"FAQPage",HOWTO:"HowTo",HOWTOSTEP:"HowToStep",AGGREGATE_RATING:"AggregateRating",WEB_PAGE:"WebPage"},o={ORGANIZATION:i.ORGANIZATION.toLocaleLowerCase(),WEB_SITE:i.WEB_SITE.toLocaleLowerCase(),FAQPAGE:i.FAQPAGE.toLocaleLowerCase(),HOWTO:i.HOWTO.toLocaleLowerCase()},a="noindex",c="noindex-nofollow",s="canonicalize"},33002:function(e,t,n){n.d(t,{Bf:function(){return i},f6:function(){return o},lO:function(){return r}});var r=function(e){return"selectOption"===e},i=function(e){return"createOption"===e},o=function(e){var t=e.spellcheckInfo||{},n=t.origQuery,r=t.origResultsCount,i=t.spellcheckedQuery;return{originalQuery:n,originalResultsCount:r,autocorrection:!!(n&&i)&&i,suggestion:!n&&i&&i}}},89522:function(e,t,n){n.d(t,{Hw:function(){return f},KC:function(){return m}});var r=n(70865),i=n(96670),o=n(26297),a=n(8149),c=n(65532),s=n(37546),u=n(44297),l=n(96109),d=n(57858);n(2784);var p=n(78809),g=function(e){var t,n=e.asset,r=e.assetType,i=e.slugify,o=e.locale;if(null==n?void 0:n.isRexEditorial)return i({description:n.description});switch(r){case a.hv:return i({description:null==n?void 0:n.description});case a.pX:return i({description:!n.description&&n.description_language_map?null!==(t=n.description_language_map[o])&&void 0!==t?t:n.description_language_map[d.NZ]:n.description});case a.tn:case a.xF:case a.IK:return(null==n?void 0:n.slug)||i({description:null==n?void 0:n.title});default:return null}},f=function(e){var t=e.asset,n=e.getRoutePathProps,a=e.slugify,c=e.locale,l=(0,o.Z)(e,["asset","getRoutePathProps","slugify","locale"]),d=(0,u.Tp)(t),p=(0,s.Lr)(t),f=g({asset:p,slugify:a,assetType:d,locale:c});return n((0,r.Z)((0,i.Z)((0,r.Z)({},p),{item:t,assetType:d,slug:f}),l))},m=function(e){var t=e.asset,n=e.getRoutePathProps,i=void 0===n?l.r:n,a=(0,o.Z)(e,["asset","getRoutePathProps"]),s=(0,p.M)(),u=(0,c.PE)().locale;return f((0,r.Z)({asset:t,getRoutePathProps:i,slugify:s,locale:u},a))}},31294:function(e,t,n){n.d(t,{Q:function(){return o}});var r=n(48417),i=n(2784),o=function(){return{encodeSearchTerm:(0,i.useCallback)(function(e){return(0,r.U9)(e)},[]),decodeSearchTerm:(0,i.useCallback)(function(e){return(0,r.JF)(e)},[])}}},61140:function(e,t,n){n.d(t,{a:function(){return o}});var r=n(19799),i=n(33002),o=function(){var e=(0,r.ug)().spellcheckInfo;return(0,i.f6)({spellcheckInfo:e})}},78809:function(e,t,n){n.d(t,{M:function(){return s}});var r=n(70865),i=n(96670),o=n(65532),a=n(42448),c=n(2784),s=function(){var e=(0,o.PE)().fullLocale;return(0,c.useCallback)(function(t){return(0,a.l)((0,i.Z)((0,r.Z)({},t),{locale:e}))},[e])}},97024:function(e,t,n){n.d(t,{JI:function(){return p},MJ:function(){return l},Wo:function(){return s},Ws:function(){return f},a$:function(){return u},jm:function(){return d}});var r=n(8149),i=n(76279),o=n(21770),a=n(27764),c=n(5632),s=function(){var e=(0,c.useRouter)().query[i.jS];return Number(void 0===e?1:e)},u=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.defaultPageSize,n=void 0===t?10:t,r=(0,c.useRouter)().query[i.dp],a=void 0===r?n:r;return(0,o.k)(a)?Number(a):n},l=function(){var e=(0,c.useRouter)().query;return{endDate:e[i.BD],startDate:e[i.yZ]}},d=function(){return{orderBy:(0,c.useRouter)().query[i.qk]}},p=function(){var e,t=(0,c.useRouter)(),n=t.query,o=n[i.Tv],s=n[i.cb],u=t.asPath,l=(0,a.oY)(u),d=r.cp[s],p=(null===(e=l.match(a._g))||void 0===e?void 0:e[1])||o||r.k4,g=(0,a.N6)(l),f=o||d||g,m=(0,a.EV)(l,f),v=r.p_[f];return{assetType:p,assetSubType:m,fullAssetType:f,fullAssetTypeFromPath:g,editorialAssetType:v}},g=/^\/editorial/i,f=function(){var e=(0,c.useRouter)().asPath;return g.test(e)}},96109:function(e,t,n){n.d(t,{r:function(){return g}});var r,i=n(8149),o=n(24114),a=n(90856),c=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.id,n=e.slug,r="".concat(n,"-").concat(t),o="/".concat(i.k4,"-").concat(i.w5,"/").concat(r);return[o,o]},s=n(12355),u=n(47842);n(38398);var l=n(85208);(0,u.Z)({},i.xN,(r={},(0,u.Z)(r,l.Dx,"/".concat(i.xN)),(0,u.Z)(r,"category","/".concat(i.xN,"/[slug]")),(0,u.Z)(r,"subCategory","/".concat(i.xN,"/[slug]/[slug]")),r));var d=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.id,n=e.slug,r="create-".concat(n?"".concat(n,"-").concat(t):t),o="/".concat(i.xN,"/").concat(r);return[o,o]},p=n(28307),g=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.assetType,n=e.id,r=e.slug,u=e.link,l=e.permalink,g=e.isIllustration,f=e.isVector,m=e.description;switch(t){case i.pX:case i.FM:case i.cF:return(0,p.f0)({id:n,slug:r,permalink:l});case i.j0:case i.xF:case i.IK:case i.jr:return(0,a.o)({id:n,slug:r});case i.tn:return(0,s.I)({id:n,slug:r});case i.hv:return d({id:n,slug:r});case i.w5:return c({id:n,slug:r});case i.k4:case i.Y_:case i.gP:default:return(0,o.QD)({link:u,permalink:l,isIllustration:g,isVector:f,id:n,description:m})}}},24114:function(e,t,n){n.d(t,{QD:function(){return g},qJ:function(){return f}});var r=n(87394),i=n(8149),o=n(44297),a=n(42448),c=n(85208),s=n(31556),u=function(e){var t=e.isVector,n=e.isIllustration;return t?i.ox:n?i.X2:i.pV},l=function(e){var t,n,i,o,a=e.link;return e.isEditorial?(t=(i=(0,r.Z)(a.split("/"),4))[2],n=i[3]):(t=(o=(0,r.Z)(a.split("/"),3))[1],n=o[2]),{imageType:t,title:n,path:a,hrefQuery:{title:n}}},d=function(e){var t=e.permalink,n=u({isVector:e.isVector,isIllustration:e.isIllustration}),o=(0,r.Z)(t.split("/"),3),a=o[1],c=o[2],s=(0,r.Z)(a.split("-"),2)[1],l="".concat(i.k4,"-").concat(n),d="".concat(c,"-").concat(s);return{imageType:l,title:d,path:"/".concat(l,"/").concat(d)}},p=function(e){var t=e.id,n=e.description,r=(0,a.l)({description:n}),o="/".concat(i.gP,"/").concat(i.k4,"-").concat(i.gP,"/").concat(r,"-").concat(t);return[o,o]},g=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=e.link,n=e.permalink,r=e.isIllustration,a=e.isVector,u=e.id,g=e.description;if(e.type===i.zo)return[t,t];if((0,o.EK)({id:u}))return p({id:u,description:g});if(!t&&!n)return[s.I$[c.Sd],s.I$[c.Sd]];var f=(n?d({permalink:n,isVector:a,isIllustration:r}):l({link:t})).path;return[f,f]},f=function(e,t,n){return e&&t?"/".concat(i.k4,"-").concat(null!=n?n:i.pV,"/").concat(e,"-").concat(t,"/text-gen"):s.I$[c.Sd]}},68871:function(e,t,n){n.d(t,{Fh:function(){return l},Sj:function(){return s},U3:function(){return u},vK:function(){return c}});var r=n(50930),i=n(71162),o=[i.gB,i.VP,i.is,i.aQ],a=(0,r.Z)(o).concat([i.Vj]),c=function(e){return o.includes(parseInt(e,10))},s=function(e){return[i.gB,i.is].includes(parseInt(e,10))},u=function(e){return a.includes(parseInt(e,10))},l=function(e){var t=e.error,n=((null==t?void 0:t.response)||t).status;return(null==t?void 0:t.code)==="ENETUNREACH"?419:(void 0===n?500:n)||500}},21770:function(e,t,n){n.d(t,{k:function(){return r}});var r=function(e){return!Number.isNaN(Number.parseFloat(e))&&!Number.isNaN(+e)}}}]);
//# sourceMappingURL=72474-c91f9d7d6f2c9841.js.map