(function(e){function t(t){for(var a,o,i=t[0],l=t[1],s=t[2],h=0,d=[];h<i.length;h++)o=i[h],Object.prototype.hasOwnProperty.call(n,o)&&n[o]&&d.push(n[o][0]),n[o]=0;for(a in l)Object.prototype.hasOwnProperty.call(l,a)&&(e[a]=l[a]);u&&u(t);while(d.length)d.shift()();return c.push.apply(c,s||[]),r()}function r(){for(var e,t=0;t<c.length;t++){for(var r=c[t],a=!0,i=1;i<r.length;i++){var l=r[i];0!==n[l]&&(a=!1)}a&&(c.splice(t--,1),e=o(o.s=r[0]))}return e}var a={},n={app:0},c=[];function o(t){if(a[t])return a[t].exports;var r=a[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,o),r.l=!0,r.exports}o.m=e,o.c=a,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},o.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)o.d(r,a,function(t){return e[t]}.bind(null,a));return r},o.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="";var i=window["webpackJsonp"]=window["webpackJsonp"]||[],l=i.push.bind(i);i.push=t,i=i.slice();for(var s=0;s<i.length;s++)t(i[s]);var u=l;c.push([0,"chunk-vendors"]),r()})({0:function(e,t,r){e.exports=r("56d7")},"56d7":function(e,t,r){"use strict";r.r(t);r("e260"),r("e6cf"),r("cca6"),r("a79d");var a=r("2b0e"),n=r("bc3a"),c=r.n(n),o=r("130e"),i=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("v-app",[r("v-navigation-drawer",{attrs:{app:"","mini-variant":e.mini},on:{"update:miniVariant":function(t){e.mini=t},"update:mini-variant":function(t){e.mini=t}}},[r("div",{staticClass:"border-bottom toggleButton",staticStyle:{"line-height":"41px"}},[r("v-btn",{attrs:{fab:"","x-small":"",icon:""},on:{click:function(t){return e.goMiniOrMax()}}},[r("v-icon",[e._v(" mdi-menu ")])],1)],1),e._l(e.treeItems,(function(e){return r("div",{key:e.name,staticClass:"border-bottom"},[r("ul",{staticClass:"plenty-treeview"},[e.hasOwnProperty("children")?[r("TreeItem",{attrs:{items:e,"has-child":!0}})]:[r("TreeItem",{attrs:{items:e}})]],2)])})),e.$store.state.openWatcher.length>0?e._l(e.$store.state.openWatcher,(function(t,a){return r("div",{key:a,staticClass:"border-bottom"},[r("ul",{staticClass:"plenty-treeview",class:{activeWatcher:e.activeWatcher()==t.id},on:{click:function(r){return e.toWatcher(t)}}},[r("li",{},[r("div",{staticClass:"d-flex"},[r("div",{staticClass:"d-flex flex-fill"},[r("i",{staticClass:"v-icon notranslate tree-icon mdi mdi-clipboard-text theme--light",staticStyle:{"font-size":"16px"},attrs:{"aria-hidden":"true"}}),r("span",{staticClass:"flex-fill"},[e._v(e._s(t.watcherName))])])])])])])})):e._e()],2),r("v-main",[r("router-view")],1)],1)},l=[],s=r("3835"),u=(r("4fad"),r("d3b7"),r("ddb0"),r("b0c0"),function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("li",{class:{open:e.open}},[r("div",{staticClass:"d-flex"},[r("div",{staticClass:"d-flex flex-fill",on:{click:function(t){return e.openOrGoTo(e.items,e.items.cart_hash)}}},[r("v-icon",{staticClass:"tree-icon",attrs:{small:""}},[e._v(" mdi-"+e._s(e.items.icon)+" ")]),r("span",{staticClass:"flex-fill"},[e._v(e._s(e.items.name))])],1),e.items.hasOwnProperty("children")?[r("v-icon",{staticClass:"tree-icon nomini",on:{click:function(t){return e.closeTree(e.items)}}},[e._v(" mdi-chevron-left ")])]:e._e()],2),e.items.hasOwnProperty("children")?[r("ul",e._l(e.items.children,(function(e,t){return r("TreeItem",{key:t,attrs:{items:e}})})),1)]:e._e()],2)])}),h=[],d={name:"TreeItem",props:["items"],data:function(){return{open:!1}},methods:{closeTree:function(){1==this.open&&(this.open=!1)},openOrGoTo:function(e,t){e.url&&this.$router.currentRoute.path!=e.url&&this.$router.push(e.url),t&&this.$router.currentRoute.path!="/cart/"+t&&this.$router.push({path:"/cart/"+t}),0==this.open&&(this.open=!0)}}},g=d,f=r("2877"),v=r("6544"),p=r.n(v),m=r("132d"),W=Object(f["a"])(g,u,h,!1,null,null,null),L=W.exports;p()(W,{VIcon:m["a"]});var b={name:"App",components:{TreeItem:L},data:function(){return{mini:!1}},created:function(){this.getInitialData()},methods:{toWatcher:function(e){window.location.hash!=="#/logWatcher/"+e.id&&this.$router.push({path:"/logWatcher/"+e.id})},openWatcher:function(){return this.$store.state.openWatcher},activeWatcher:function(){return this.$store.state.activeWatcher},getInitialData:function(){var e=this,t=this;t.$http.get("/rest/logs/integration_keys").then((function(t){if(t){for(var r=t.data,a=[],n=0;n<r.length;n++)a.push(r[n]);e.$store.commit("integrations",a)}}))["catch"]((function(e){console.log("INTEGRATION_KEYS",e)})),t.$http.get("/rest/logs/reference_types").then((function(t){if(t){for(var r=t.data,a=[],n=0,c=Object.entries(r);n<c.length;n++){var o=Object(s["a"])(c[n],2),i=o[0];o[1];a.push(i)}e.$store.commit("referenceTypes",a)}}))["catch"]((function(e){console.log(e)})),t.$http.post("/rest/SpotlightLogWatcher/ui/getUiData/").then((function(t){if(t){for(var r=t.data,a=[],n=0;n<r.logs.entries.length;n++)a.push({watcherName:r.logs.entries[n].watcherName,id:r.logs.entries[n].id,level:r.logs.entries[n].level,integration:r.logs.entries[n].integration,identifier:r.logs.entries[n].identifier,referenceType:r.logs.entries[n].referenceType,referenceValue:r.logs.entries[n].referenceValue,emailTitle:r.logs.entries[n].emailTitle,sendTo:r.logs.entries[n].sendTo,bcc:r.logs.entries[n].bcc,cronIntervall:r.logs.entries[n].cronIntervall});e.$store.commit("LogWatcherBody",a),e.$store.commit("loadingTable",!1)}}))["catch"]((function(e){console.log(e)}))},goMiniOrMax:function(){this.mini?this.mini=!1:this.mini=!0},setCurrentActive:function(e){for(var t=0;t<this.treeItems.length;t++)this.treeItems[t].active=!1;for(var r=0;r<this.treeItems.length;r++)this.treeItems[r].highlight==e.name&&(this.treeItems[r].active=!0)}},watch:{$route:function(){this.$router.currentRoute.params.id>0?this.$store.commit("activeWatcher",this.$router.currentRoute.params.id):this.$store.commit("activeWatcher",0),this.setCurrentActive(this.$router.currentRoute)}},computed:{treeItems:function(){var e=[{name:"Dashboard",icon:"chart-bar",key:"dashboard",url:"/",active:!1}];return e}}},y=b,T=r("7496"),x=r("8336"),_=r("f6c4"),w=r("f774"),$=Object(f["a"])(y,i,l,!1,null,null,null),k=$.exports;p()($,{VApp:T["a"],VBtn:x["a"],VIcon:m["a"],VMain:_["a"],VNavigationDrawer:w["a"]});var V=r("8c4f"),C=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("v-toolbar",{staticClass:"d-flex w-100 align-center",staticStyle:{"justify-content":"end",height:"41px"},attrs:{elevation:"1"}},[r("v-btn",{staticStyle:{height:"37px"},attrs:{color:"success",depressed:""},on:{click:function(t){return e.$router.push({path:"/logWatcher/0"})}}},[r("v-icon",[e._v(" mdi-plus ")]),e._v(" Neuen Watcher erstellen ")],1)],1),r("v-container",{attrs:{fluid:""}},[r("div",{staticClass:" pa-3"},[r("v-row",{staticClass:"h-100"},[r("v-col",{attrs:{cols:"12"}},[[r("v-data-table",{staticClass:"elevation-3",attrs:{loading:e.loadingTable,headers:e.LogWatcherHeader,items:e.LogWatcherBody,"items-per-page":100,"hide-default-footer":""},on:{"click:row":function(t){return e.setLogWatcher(t)}},scopedSlots:e._u([{key:"item.identifier",fn:function(t){var r=t.item;return[r.identifier.length<1?[e._v(" Kein Idenfikator hinterlegt ")]:[e._v(" "+e._s(r.identifier)+" ")]]}},{key:"item.integration",fn:function(t){var r=t.item;return[r.integration.length<1?[e._v(" Keine Integration hinterlegt ")]:[e._v(" "+e._s(r.integration)+" ")]]}},{key:"item.referenceType",fn:function(t){var r=t.item;return[r.referenceType.length<1?[e._v(" Kein Referenz Typ hinterlegt ")]:[e._v(" "+e._s(r.referenceType)+" ")]]}},{key:"item.referenceValue",fn:function(t){var r=t.item;return[r.referenceValue.length<1?[e._v(" Kein Referenz Wert hinterlegt ")]:[e._v(" "+e._s(r.referenceValue)+" ")]]}}])})]],2)],1)],1)]),r("v-snackbar",{attrs:{right:"",top:"",color:e.alert.type,elevation:"15",timeout:3e3},model:{value:e.alert.active,callback:function(t){e.$set(e.alert,"active",t)},expression:"alert.active"}},[e._v(" "+e._s(e.alert.message)+" ")])],1)},I=[],S={name:"Main",data:function(){return{LogWatcherHeader:[{text:"Name",value:"watcherName"},{text:"Level",value:"level"},{text:"Identifikator",sortable:!0,value:"identifier"},{text:"Integration",sortable:!0,value:"integration"},{text:"Referenz Typ",sortable:!0,value:"referenceType"},{text:"Referenz Wert",sortable:!0,value:"referenceValue"}],loading:{table:!1},alert:{message:"",active:!1,type:""}}},computed:{loadingTable:function(){return this.$store.state.loadingTable},LogWatcherBody:function(){return this.$store.state.LogWatcherBody}},methods:{setLogWatcher:function(e){this.$store.commit("pushWatcher",e),this.$router.push({path:"/logWatcher/"+e.id})}}},B=S,N=r("62ad"),O=r("a523"),M=r("8fea"),j=r("0fd9"),D=r("2db4"),E=r("71d9"),R=Object(f["a"])(B,C,I,!1,null,null,null),P=R.exports;p()(R,{VBtn:x["a"],VCol:N["a"],VContainer:O["a"],VDataTable:M["a"],VIcon:m["a"],VRow:j["a"],VSnackbar:D["a"],VToolbar:E["a"]});var z=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",[r("v-toolbar",{staticStyle:{height:"41px"},attrs:{elevation:"1"}},[r("v-row",{staticClass:"d-flex w-100",staticStyle:{height:"37px"}},[r("v-col",{staticStyle:{height:"37px"},attrs:{cols:"2"}},[r("h4",[e.currentLogWatcher.id>-1?[e._v(" Log Watcher bearbeiten ")]:[e._v(" Neuen Log Watcher Erstellen ")]],2)]),r("v-col",{staticClass:"d-flex align-center",staticStyle:{height:"37px","justify-content":"end"},attrs:{cols:"10"}},[e.currentLogWatcher.id>-1?r("v-btn",{attrs:{color:"primary",depressed:"",disabled:1==e.loading.update},on:{click:function(t){return e.updateLogWatcher()}}},[r("v-icon",[e._v(" mdi-content-save ")]),e._v(" Änderungen Speichern ")],1):r("v-btn",{attrs:{color:"success",depressed:"",disabled:1==e.loading.add},on:{click:function(t){return e.createLogWatcher()}}},[r("v-icon",[e._v(" mdi-plus ")]),e._v(" Erstellen ")],1),r("v-btn",{staticClass:"ml-3",attrs:{color:"error",depressed:"",disabled:e.currentLogWatcher.id<1},on:{click:function(t){e.deleteLogModalShow=!0}}},[r("v-icon",[e._v(" mdi-delete ")]),e._v(" Watcher Löschen ")],1)],1)],1)],1),r("v-container",{staticClass:" pa-3",attrs:{fluid:""}},[r("v-row",[r("v-col",{attrs:{cols:"12"}},[r("v-row",[r("v-col",{attrs:{cols:"4"}},[r("v-card",{attrs:{rounded:""}},[r("v-card-text",{staticClass:"p-3",staticStyle:{height:"300px"}},[r("v-text-field",{attrs:{label:"Watcher Name","hide-details":"auto",type:"string"},model:{value:e.currentLogWatcher.watcherName,callback:function(t){e.$set(e.currentLogWatcher,"watcherName",t)},expression:"currentLogWatcher.watcherName"}}),r("v-text-field",{staticClass:"mt-3",attrs:{label:"Betreff für Email bei gefundenem Log","hide-details":"auto",type:"text"},model:{value:e.currentLogWatcher.emailTitle,callback:function(t){e.$set(e.currentLogWatcher,"emailTitle",t)},expression:"currentLogWatcher.emailTitle"}}),r("v-text-field",{staticClass:"mt-3",attrs:{label:"Email Adresse","hide-details":"auto",type:"text"},model:{value:e.currentLogWatcher.sendTo,callback:function(t){e.$set(e.currentLogWatcher,"sendTo",t)},expression:"currentLogWatcher.sendTo"}}),r("v-text-field",{staticClass:"mt-3",attrs:{label:"BCC Email","hide-details":"auto",type:"text",disabled:""==e.currentLogWatcher.sendTo},model:{value:e.currentLogWatcher.bcc,callback:function(t){e.$set(e.currentLogWatcher,"bcc",t)},expression:"currentLogWatcher.bcc"}})],1)],1)],1),r("v-col",{attrs:{cols:"4"}},[r("v-card",{attrs:{rounded:""}},[r("v-card-text",{staticClass:"p-3",staticStyle:{height:"300px"}},[r("v-autocomplete",{attrs:{items:e.selectData.integration,label:"Log Integration"},model:{value:e.currentLogWatcher.integration,callback:function(t){e.$set(e.currentLogWatcher,"integration",t)},expression:"currentLogWatcher.integration"}}),r("v-autocomplete",{attrs:{items:e.selectData.referenceType,label:"Referenz Typ"},model:{value:e.currentLogWatcher.referenceType,callback:function(t){e.$set(e.currentLogWatcher,"referenceType",t)},expression:"currentLogWatcher.referenceType"}}),r("v-text-field",{attrs:{label:"Referenz Wert","hide-details":"auto",type:"string",disabled:""==e.currentLogWatcher.referenceType},model:{value:e.currentLogWatcher.referenceValue,callback:function(t){e.$set(e.currentLogWatcher,"referenceValue",t)},expression:"currentLogWatcher.referenceValue"}}),r("v-text-field",{attrs:{label:"Log Identifikator","hide-details":"auto",type:"string"},model:{value:e.currentLogWatcher.identifier,callback:function(t){e.$set(e.currentLogWatcher,"identifier",t)},expression:"currentLogWatcher.identifier"}})],1)],1)],1),r("v-col",{attrs:{cols:"4"}},[r("v-card",{attrs:{rounded:""}},[r("v-card-text",{staticClass:"p-3",staticStyle:{height:"300px"}},[r("v-select",{attrs:{items:e.selectData.cronIntervall,label:"Intervall"},model:{value:e.currentLogWatcher.cronIntervall,callback:function(t){e.$set(e.currentLogWatcher,"cronIntervall",t)},expression:"currentLogWatcher.cronIntervall"}}),r("v-select",{staticClass:"mt-3",attrs:{items:e.selectData.level,label:"Log Level",multiple:""},model:{value:e.currentLogWatcher.level,callback:function(t){e.$set(e.currentLogWatcher,"level",t)},expression:"currentLogWatcher.level"}})],1)],1)],1)],1)],1)],1)],1),r("v-snackbar",{attrs:{right:"",top:"",color:e.alert.type,elevation:"15",timeout:3e3},model:{value:e.alert.active,callback:function(t){e.$set(e.alert,"active",t)},expression:"alert.active"}},[e._v(" "+e._s(e.alert.message)+" ")]),r("v-col",{attrs:{cols:"auto"}},[r("v-dialog",{attrs:{transition:"dialog-top-transition","max-width":"600"},model:{value:e.deleteLogModalShow,callback:function(t){e.deleteLogModalShow=t},expression:"deleteLogModalShow"}},[r("v-card",[r("v-toolbar",{staticClass:"text-h6",attrs:{color:"error",dark:""}},[e._v(" Log Watcher "+e._s(e.currentLogWatcher.watcherName)+" löschen ")]),r("v-card-text",[r("div",{staticClass:"text-h5 pa-5"},[e._v(" Löscht den Logwatcher "+e._s(e.currentLogWatcher.id)+" - "+e._s(e.currentLogWatcher.watcherName)),r("br")])]),r("v-card-actions",{staticClass:"justify-end"},[r("v-btn",{attrs:{color:"error"},on:{click:function(t){e.deleteLogWatcher(),e.deleteLogModalShow=!1}}},[r("v-icon",[e._v(" mdi-delete ")]),e._v(" Löschen ")],1),r("v-btn",{attrs:{color:"primary"},on:{click:function(t){e.deleteLogModalShow=!1}}},[e._v(" Abbrechen ")])],1)],1)],1)],1)],1)},A=[],K=(r("4795"),r("a434"),{name:"Main",data:function(){return{currentLogWatcher:{id:-1,watcherName:"",level:["error"],integration:"",identifier:"",referenceType:"",referenceValue:"",emailTitle:"Plenty Log Watcher",sendTo:"",bcc:"",cronIntervall:"alle 15 Minuten"},deleteLogModalShow:!1,mainTabs:0,loading:{table:!1,delete:!1,update:!1,add:!1},alert:{message:"",active:!1,type:""}}},computed:{LogWatcherBody:function(){return this.$store.state.LogWatcherBody},routeWatcher:function(){return this.$route.params},selectData:function(){return{level:["alert","critical","error","info"],referenceType:this.$store.state.referenceTypes,integration:this.$store.state.integrations,cronIntervall:["alle 15 Minuten","Stündlich","Täglich"]}}},mounted:function(){this.setWatcher()},watch:{$route:function(){this.setWatcher()}},methods:{setWatcher:function(){var e=this.routeWatcher;if(this.routeWatcher.id<1)this.currentLogWatcher={id:-1,watcherName:"",level:["error"],integration:"",identifier:"",referenceType:"",referenceValue:"",emailTitle:"Plenty Log Watcher",sendTo:"",bcc:"",cronIntervall:"alle 15 Minuten"};else for(var t=0;t<this.LogWatcherBody.length;t++)this.LogWatcherBody[t].id==e.id&&(console.log(this.LogWatcherBody[t]),this.currentLogWatcher=this.LogWatcherBody[t])},createLogWatcher:function(){var e=this,t=this;if(""!==t.currentLogWatcher.emailTitle&&""!==t.currentLogWatcher.sendTo&&""!==t.currentLogWatcher){t.loading.add=!0;for(var r={watcherName:t.currentLogWatcher.watcherName,integration:t.currentLogWatcher.integration,identifier:t.currentLogWatcher.identifier,referenceType:t.currentLogWatcher.referenceType,referenceValue:t.currentLogWatcher.referenceValue,emailTitle:t.currentLogWatcher.emailTitle,sendTo:t.currentLogWatcher.sendTo,bcc:t.currentLogWatcher.bcc,cronIntervall:t.currentLogWatcher.cronIntervall,level:[]},a=0;a<t.currentLogWatcher.level.length;a++)r.level.push(t.currentLogWatcher.level[a]);t.$http.post("/rest/SpotlightLogWatcher/ui/createLogWatcher/",r).then((function(r){if(r){var a=r.data;a.id>0&&(t.LogWatcherBody.unshift({watcherName:a.watcherName,id:a.id,level:a.level,integration:a.integration,identifier:a.identifier,referenceType:a.referenceType,referenceValue:a.referenceValue,emailTitle:a.emailTitle,sendTo:a.sendTo,bcc:a.bcc,cronIntervall:a.cronIntervall}),e.$store.commit("LogWatcherBody",t.LogWatcherBody),t.alert.message="Der Watcher wurde erfolgreich erstellt",t.alert.active=!0,t.alert.type="success",setTimeout((function(){t.loading.add=!1,t.$router.push("/")}),1e3))}}))["catch"]((function(e){t.loading.add=!1,console.log("createLogWatcher",e)}))}else t.alert.message="Bitte geben sie einen Email Titel , Namen für den Watcher und Emailadresse hinzu",t.alert.active=!0,t.alert.type="error"},updateLogWatcher:function(){var e=this,t=this;if(""!==t.currentLogWatcher.emailTitle&&""!==t.currentLogWatcher.sendTo&&""!==t.currentLogWatcher){t.loading.update=!0;var r={watcherName:t.currentLogWatcher.watcherName,id:t.currentLogWatcher.id,level:t.currentLogWatcher.level,integration:t.currentLogWatcher.integration,identifier:t.currentLogWatcher.identifier,referenceType:t.currentLogWatcher.referenceType,referenceValue:t.currentLogWatcher.referenceValue,emailTitle:t.currentLogWatcher.emailTitle,sendTo:t.currentLogWatcher.sendTo,bcc:t.currentLogWatcher.bcc,cronIntervall:t.currentLogWatcher.cronIntervall};r.level=[];for(var a=0;a<t.currentLogWatcher.level.length;a++)r.level.push(t.currentLogWatcher.level[a]);t.$http.post("/rest/SpotlightLogWatcher/ui/updateLogWatcher/",r).then((function(r){if(r&&r.data.id>0)for(var a=0;a<t.LogWatcherBody.length;a++)t.LogWatcherBody[a].id==t.currentLogWatcher.id&&(t.LogWatcherBody.splice(a,1,t.currentLogWatcher),e.$store.commit("LogWatcherBody",t.LogWatcherBody),t.alert.message="Der Watcher wurde erfolgreich aktualisiert",t.alert.active=!0,t.alert.type="success",setTimeout((function(){t.loading.update=!1,t.$router.push("/")}),1e3))}))["catch"]((function(e){t.loading.update=!1,console.log("updateLogWatcher",e)}))}else t.alert.message="Bitte geben sie einen Email Titel , Namen für den Watcher und Emailadresse hinzu",t.alert.active=!0,t.alert.type="error"},deleteLogWatcher:function(){var e=this,t=this;t.$http.get("/rest/SpotlightLogWatcher/ui/deleteLogWatcher/"+t.currentLogWatcher.id).then((function(r){if(r&&"success"==r.data.message){for(var a=0;a<t.LogWatcherBody.length;a++)t.LogWatcherBody[a].id==t.currentLogWatcher.id&&t.LogWatcherBody.splice(a,1);e.$store.commit("spliceWatcher",t.currentLogWatcher.id),e.$store.commit("LogWatcherBody",t.LogWatcherBody),t.alert.message="Der Watcher wurde erfolgreich gelöscht",t.alert.active=!0,t.alert.type="success",setTimeout((function(){t.$router.push("/")}),1e3)}}))["catch"]((function(e){t.alert.message="Der Watcher konnte nicht gelöscht werden",t.alert.active=!0,t.alert.type="error"}))}}}),G=K,H=r("c6a6"),J=r("b0af"),F=r("99d9"),U=r("169a"),Y=r("b974"),q=r("8654"),Q=Object(f["a"])(G,z,A,!1,null,null,null),X=Q.exports;p()(Q,{VAutocomplete:H["a"],VBtn:x["a"],VCard:J["a"],VCardActions:F["a"],VCardText:F["b"],VCol:N["a"],VContainer:O["a"],VDialog:U["a"],VIcon:m["a"],VRow:j["a"],VSelect:Y["a"],VSnackbar:D["a"],VTextField:q["a"],VToolbar:E["a"]}),a["a"].use(V["a"]);var Z=[{path:"/",name:"dashboard",component:P},{path:"/logWatcher/:id",name:"Log Watcher",component:X}],ee=new V["a"]({routes:Z}),te=ee,re=(r("c975"),r("2f62"));a["a"].use(re["a"]);var ae=new re["a"].Store({state:{referenceTypes:[],integrations:[],LogWatcherBody:[],loadingTable:!0,openWatcher:[],activeWatcher:0},mutations:{activeWatcher:function(e,t){e.activeWatcher=t},pushWatcher:function(e,t){for(var r=!0,a=0;a<e.openWatcher.length;a++)e.openWatcher[a].id==t.id&&(r=!1);1==r&&e.openWatcher.push(t)},spliceWatcher:function(e,t){for(var r=0;r<e.openWatcher.length;r++)e.openWatcher[r].id==t&&e.openWatcher.splice(e.openWatcher.indexOf(r),1)},loadingTable:function(e,t){e.loadingTable=t},LogWatcherBody:function(e,t){e.LogWatcherBody=t},integrations:function(e,t){e.integrations=t},referenceTypes:function(e,t){e.referenceTypes=t}},actions:{},modules:{}}),ne=r("f309");a["a"].use(ne["a"]);var ce=new ne["a"]({}),oe=localStorage.getItem("accessToken");c.a.defaults.headers.common={Authorization:"Bearer "+oe},a["a"].use(o["a"],c.a),a["a"].config.productionTip=!1,new a["a"]({router:te,store:ae,vuetify:ce,render:function(e){return e(k)}}).$mount("#app")}});
//# sourceMappingURL=app.f9e5eb76.js.map