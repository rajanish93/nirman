import{g as $,n as N}from"./links.C7Z9vJvv.js";import"./default-i18n.Bd0Z306Z.js";import{x as i,c as h,C as t,m as a,o as p,a as c,D as m,t as n,F as A,K as V,l as B,d as f,H as O}from"./vue.esm-bundler.CWQFYt9y.js";import{_ as T}from"./_plugin-vue_export-helper.BN1snXvA.js";import{u as E,W as L}from"./Wizard.Pub5ikTG.js";import{B as U}from"./Checkbox.D2dfpbIi.js";import{C as F}from"./ProBadge.WwPkDor4.js";import{G as q,a as D}from"./Row.CzuhYwfs.js";import{W as G,a as I,b as H}from"./Header.D-9OXdCK.js";import{W as R}from"./CloseAndExit.CmAXroa7.js";import{_ as j}from"./Steps.jKD3a_Th.js";import"./helpers.DkJd815A.js";import"./addons.CFmx_7nM.js";import"./upperFirst.DnE5bcuK.js";import"./_stringToArray.DnK4tKcY.js";import"./toString.24fN1xMd.js";import"./Checkmark.pCOnqh_g.js";import"./Logo.DoVR4qom.js";import"./Caret.iRBf3wcH.js";import"./Index.CowwYZV6.js";const K={setup(){const{strings:e}=E();return{setupWizardStore:$(),composableStrings:e}},components:{BaseCheckbox:U,CoreProBadge:F,GridColumn:q,GridRow:D,WizardBody:G,WizardCloseAndExit:R,WizardContainer:I,WizardHeader:H,WizardSteps:j},mixins:[L],data(){return{loading:!1,stage:"features",strings:N(this.composableStrings,{whichFeatures:this.$t.__("Which SEO features do you want to enable?",this.$td),description:this.$t.__("We have already selected our recommended features based on your site category, but you can use the following features to fine-tune your site.",this.$td)})}},computed:{showPluginsAll(){return(this.setupWizardStore.features.includes("analytics")||this.setupWizardStore.features.includes("broken-link-checker")||this.setupWizardStore.features.includes("conversion-tools"))&&(this.setupWizardStore.features.includes("aioseo-eeat")||this.setupWizardStore.features.includes("aioseo-image-seo")||this.setupWizardStore.features.includes("aioseo-index-now")||this.setupWizardStore.features.includes("aioseo-link-assistant")||this.setupWizardStore.features.includes("aioseo-local-business")||this.setupWizardStore.features.includes("aioseo-news-sitemap")||this.setupWizardStore.features.includes("aioseo-redirects")||this.setupWizardStore.features.includes("aioseo-rest-api")||this.setupWizardStore.features.includes("aioseo-video-sitemap"))},showPluginsAddons(){return(!this.setupWizardStore.features.includes("analytics")||!this.setupWizardStore.features.includes("broken-link-checker")||!this.setupWizardStore.features.includes("conversion-tools"))&&(this.setupWizardStore.features.includes("aioseo-eeat")||this.setupWizardStore.features.includes("aioseo-image-seo")||this.setupWizardStore.features.includes("aioseo-index-now")||this.setupWizardStore.features.includes("aioseo-link-assistant")||this.setupWizardStore.features.includes("aioseo-local-business")||this.setupWizardStore.features.includes("aioseo-news-sitemap")||this.setupWizardStore.features.includes("aioseo-redirects")||this.setupWizardStore.features.includes("aioseo-rest-api")||this.setupWizardStore.features.includes("aioseo-video-sitemap"))},showPluginsOnly(){return(this.setupWizardStore.features.includes("analytics")||this.setupWizardStore.features.includes("broken-link-checker")||this.setupWizardStore.features.includes("conversion-tools"))&&!this.setupWizardStore.features.includes("aioseo-eeat")&&!this.setupWizardStore.features.includes("aioseo-image-seo")&&!this.setupWizardStore.features.includes("aioseo-index-now")&&!this.setupWizardStore.features.includes("aioseo-link-assistant")&&!this.setupWizardStore.features.includes("aioseo-local-business")&&!this.setupWizardStore.features.includes("aioseo-news-sitemap")&&!this.setupWizardStore.features.includes("aioseo-redirects")&&!this.setupWizardStore.features.includes("aioseo-rest-api")&&!this.setupWizardStore.features.includes("aioseo-video-sitemap")},getPluginsText(){return this.showPluginsOnly?this.$t.sprintf(this.$t.__("The following plugins will be installed: %1$s",this.$td),this.getPluginNames):this.showPluginsAddons?this.$t.sprintf(this.$t.__("The following %1$s addons will be installed: %2$s",this.$td),"AIOSEO",this.getPluginNames):this.showPluginsAll?this.$t.sprintf(this.$t.__("The following plugins and %1$s addons will be installed: %2$s",this.$td),"AIOSEO",this.getPluginNames):null},getPluginNames(){const e=[];this.features.forEach(r=>{this.setupWizardStore.features.includes(r.value)&&r.pluginName&&e.push(r.pluginName)});let o="";return 1<e.length?o=this.$t.sprintf(this.$t.__(" and %1$s",this.$td),e[e.length-1]):o=e[e.length-1],delete e[e.length-1],e.join(", ").replace(/(^[,\s]+)|([,\s]+$)/g,"")+o}},methods:{preventUncheck(e,o){o.required&&(e.preventDefault(),e.stopPropagation())},getValue(e){return this.setupWizardStore.features.includes(e.value)},updateValue(e,o){const u=[...this.setupWizardStore.features];if(e){u.push(o.value),this.setupWizardStore.features=u;return}const r=u.findIndex(l=>l===o.value);r!==-1&&u.splice(r,1),this.setupWizardStore.features=u},saveAndContinue(){this.loading=!0,this.setupWizardStore.saveWizard("features").then(()=>{this.$router.push(this.setupWizardStore.getNextLink)})}}},J={class:"aioseo-wizard-features"},M={class:"header"},Q={class:"description"},X={class:"settings-name"},Y={class:"name small-margin"},Z={class:"aioseo-description-text"},ee={key:0,class:"aioseo-installs-text"},se={class:"go-back"},te=c("div",{class:"spacer"},null,-1),ie={key:0,class:"plugins"};function oe(e,o,u,r,l,d){const W=i("wizard-header"),S=i("wizard-steps"),w=i("core-pro-badge"),g=i("grid-column"),k=i("base-checkbox"),b=i("grid-row"),z=i("router-link"),v=i("base-button"),y=i("wizard-body"),x=i("wizard-close-and-exit"),P=i("wizard-container");return p(),h("div",J,[t(W),t(P,null,{default:a(()=>[t(y,null,{footer:a(()=>[c("div",se,[t(z,{to:r.setupWizardStore.getPrevLink,class:"no-underline"},{default:a(()=>[m("←")]),_:1},8,["to"]),m("   "),t(z,{to:r.setupWizardStore.getPrevLink},{default:a(()=>[m(n(l.strings.goBack),1)]),_:1},8,["to"])]),te,t(v,{type:"blue",loading:l.loading,onClick:d.saveAndContinue},{default:a(()=>[m(n(l.strings.saveAndContinue)+" →",1)]),_:1},8,["loading","onClick"])]),default:a(()=>[t(S),c("div",M,n(l.strings.whichFeatures),1),c("div",Q,n(l.strings.description),1),(p(!0),h(A,null,V(e.features,(s,C)=>(p(),h("div",{key:C,class:"feature-grid small-padding medium-margin"},[t(b,null,{default:a(()=>[t(g,{xs:"11"},{default:a(()=>[c("div",X,[c("div",Y,[m(n(s.name)+" ",1),e.needsUpsell(s)?(p(),B(w,{key:0})):f("",!0)]),c("div",Z,n(s.description),1),s.installs&&d.getValue(s)?(p(),h("div",ee,n(s.installs),1)):f("",!0)])]),_:2},1024),t(g,{xs:"1"},{default:a(()=>[t(k,{round:"",class:O({"no-clicks":s.required}),type:s.required?"green":"blue",modelValue:s.required?!0:d.getValue(s),"onUpdate:modelValue":_=>d.updateValue(_,s),onClick:_=>d.preventUncheck(_,s)},null,8,["class","type","modelValue","onUpdate:modelValue","onClick"])]),_:2},1024)]),_:2},1024)]))),128))]),_:1}),d.getPluginsText?(p(),h("div",ie,n(d.getPluginsText),1)):f("",!0),t(x)]),_:1})])}const ye=T(K,[["render",oe]]);export{ye as default};