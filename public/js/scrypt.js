(function(u,r){"function"===typeof define&&define.amd?define([],r):"function"===typeof require&&"object"===typeof module&&module&&module.exports?module.exports=r():(u.dcodeIO=u.dcodeIO||{}).bcrypt=r()})(this,function(){function u(e){if("undefined"!==typeof module&&module&&module.exports)try{return require("crypto").randomBytes(e)}catch(d){}try{var c;(self.crypto||self.msCrypto).getRandomValues(c=new Uint32Array(e));return Array.prototype.slice.call(c)}catch(b){}if(!w)throw Error("Neither WebCryptoAPI nor a crypto module is available. Use bcrypt.setRandomFallback to set an alternative");
return w(e)}function r(e,d){for(var c=0,b=0,a=0,f=e.length;a<f;++a)e.charCodeAt(a)===d.charCodeAt(a)?++c:++b;return 0>c?!1:0===b}function H(e){var d=[],c=0;I.encodeUTF16toUTF8(function(){return c>=e.length?null:e.charCodeAt(c++)},function(b){d.push(b)});return d}function x(e,d){var c=0,b=[],a,f;if(0>=d||d>e.length)throw Error("Illegal len: "+d);for(;c<d;){a=e[c++]&255;b.push(s[a>>2&63]);a=(a&3)<<4;if(c>=d){b.push(s[a&63]);break}f=e[c++]&255;a|=f>>4&15;b.push(s[a&63]);a=(f&15)<<2;if(c>=d){b.push(s[a&
63]);break}f=e[c++]&255;a|=f>>6&3;b.push(s[a&63]);b.push(s[f&63])}return b.join("")}function B(e,d){var c=0,b=e.length,a=0,f=[],g,m,h;if(0>=d)throw Error("Illegal len: "+d);for(;c<b-1&&a<d;){h=e.charCodeAt(c++);g=h<q.length?q[h]:-1;h=e.charCodeAt(c++);m=h<q.length?q[h]:-1;if(-1==g||-1==m)break;h=g<<2>>>0;h|=(m&48)>>4;f.push(z(h));if(++a>=d||c>=b)break;h=e.charCodeAt(c++);g=h<q.length?q[h]:-1;if(-1==g)break;h=(m&15)<<4>>>0;h|=(g&60)>>2;f.push(z(h));if(++a>=d||c>=b)break;h=e.charCodeAt(c++);m=h<q.length?
q[h]:-1;h=(g&3)<<6>>>0;h|=m;f.push(z(h));++a}b=[];for(c=0;c<a;c++)b.push(f[c].charCodeAt(0));return b}function v(e,d,c,b){var a,f=e[d],g=e[d+1],f=f^c[0];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^c[1];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[2];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^c[3];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[4];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|
f>>8&255];a+=b[768|f&255];g=g^a^c[5];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[6];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^c[7];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[8];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^c[9];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[10];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^
c[11];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[12];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^c[13];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[14];a=b[f>>>24];a+=b[256|f>>16&255];a^=b[512|f>>8&255];a+=b[768|f&255];g=g^a^c[15];a=b[g>>>24];a+=b[256|g>>16&255];a^=b[512|g>>8&255];a+=b[768|g&255];f=f^a^c[16];e[d]=g^c[17];e[d+1]=f;return e}function t(e,d){for(var c=0,b=0;4>c;++c)b=b<<8|e[d]&255,d=(d+1)%e.length;
return{key:b,offp:d}}function C(e,d,c){for(var b=0,a=[0,0],f=d.length,g=c.length,m,h=0;h<f;h++)m=t(e,b),b=m.offp,d[h]^=m.key;for(h=0;h<f;h+=2)a=v(a,0,d,c),d[h]=a[0],d[h+1]=a[1];for(h=0;h<g;h+=2)a=v(a,0,d,c),c[h]=a[0],c[h+1]=a[1]}function J(e,d,c,b){for(var a=0,f=[0,0],g=c.length,m=b.length,h,l=0;l<g;l++)h=t(d,a),a=h.offp,c[l]^=h.key;for(l=a=0;l<g;l+=2)h=t(e,a),a=h.offp,f[0]^=h.key,h=t(e,a),a=h.offp,f[1]^=h.key,f=v(f,0,c,b),c[l]=f[0],c[l+1]=f[1];for(l=0;l<m;l+=2)h=t(e,a),a=h.offp,f[0]^=h.key,h=t(e,
a),a=h.offp,f[1]^=h.key,f=v(f,0,c,b),b[l]=f[0],b[l+1]=f[1]}function D(e,d,c,b,a){function f(){a&&a(n/c);if(n<c)for(var h=Date.now();n<c&&!(n+=1,C(e,l,k),C(d,l,k),100<Date.now()-h););else{for(n=0;64>n;n++)for(y=0;y<m>>1;y++)v(g,y<<1,l,k);h=[];for(n=0;n<m;n++)h.push((g[n]>>24&255)>>>0),h.push((g[n]>>16&255)>>>0),h.push((g[n]>>8&255)>>>0),h.push((g[n]&255)>>>0);if(b){b(null,h);return}return h}b&&p(f)}var g=E.slice(),m=g.length,h;if(4>c||31<c){h=Error("Illegal number of rounds (4-31): "+c);if(b){p(b.bind(this,
h));return}throw h;}if(16!==d.length){h=Error("Illegal salt length: "+d.length+" != 16");if(b){p(b.bind(this,h));return}throw h;}c=1<<c>>>0;var l,k,n=0,y;Int32Array?(l=new Int32Array(F),k=new Int32Array(G)):(l=F.slice(),k=G.slice());J(d,e,l,k);if("undefined"!==typeof b)f();else for(;;)if("undefined"!==typeof(h=f()))return h||[]}function A(e,d,c,b){function a(a){var b=[];b.push("$2");"a"<=f&&b.push(f);b.push("$");10>l&&b.push("0");b.push(l.toString());b.push("$");b.push(x(k,k.length));b.push(x(a,4*
E.length-1));return b.join("")}if("string"!==typeof e||"string"!==typeof d){b=Error("Invalid string / salt: Not a string");if(c){p(c.bind(this,b));return}throw b;}var f,g;if("$"!==d.charAt(0)||"2"!==d.charAt(1)){b=Error("Invalid salt version: "+d.substring(0,2));if(c){p(c.bind(this,b));return}throw b;}if("$"===d.charAt(2))f=String.fromCharCode(0),g=3;else{f=d.charAt(2);if("a"!==f&&"b"!==f&&"y"!==f||"$"!==d.charAt(3)){b=Error("Invalid salt revision: "+d.substring(2,4));if(c){p(c.bind(this,b));return}throw b;
}g=4}if("$"<d.charAt(g+2)){b=Error("Missing salt rounds");if(c){p(c.bind(this,b));return}throw b;}var m=10*parseInt(d.substring(g,g+1),10),h=parseInt(d.substring(g+1,g+2),10),l=m+h;d=d.substring(g+3,g+25);e=H(e+("a"<=f?"\x00":""));var k=B(d,16);if("undefined"==typeof c)return a(D(e,k,l));D(e,k,l,function(b,d){b?c(b,null):c(null,a(d))},b)}var k={},w=null;try{u(1)}catch(K){}w=null;k.setRandomFallback=function(e){w=e};k.genSaltSync=function(e,d){e=e||10;if("number"!==typeof e)throw Error("Illegal arguments: "+
typeof e+", "+typeof d);4>e?e=4:31<e&&(e=31);var c=[];c.push("$2a$");10>e&&c.push("0");c.push(e.toString());c.push("$");c.push(x(u(16),16));return c.join("")};k.genSalt=function(e,d,c){function b(a){p(function(){try{a(null,k.genSaltSync(e))}catch(b){a(b)}})}"function"===typeof d&&(c=d,d=void 0);"function"===typeof e&&(c=e,e=void 0);if("undefined"===typeof e)e=10;else if("number"!==typeof e)throw Error("illegal arguments: "+typeof e);if(c){if("function"!==typeof c)throw Error("Illegal callback: "+
typeof c);b(c)}else return new Promise(function(a,c){b(function(b,d){b?c(b):a(d)})})};k.hashSync=function(e,d){"undefined"===typeof d&&(d=10);"number"===typeof d&&(d=k.genSaltSync(d));if("string"!==typeof e||"string"!==typeof d)throw Error("Illegal arguments: "+typeof e+", "+typeof d);return A(e,d)};k.hash=function(e,d,c,b){function a(a){"string"===typeof e&&"number"===typeof d?k.genSalt(d,function(c,d){A(e,d,a,b)}):"string"===typeof e&&"string"===typeof d?A(e,d,a,b):p(a.bind(this,Error("Illegal arguments: "+
typeof e+", "+typeof d)))}if(c){if("function"!==typeof c)throw Error("Illegal callback: "+typeof c);a(c)}else return new Promise(function(b,c){a(function(a,d){a?c(a):b(d)})})};k.compareSync=function(e,d){if("string"!==typeof e||"string"!==typeof d)throw Error("Illegal arguments: "+typeof e+", "+typeof d);return 60!==d.length?!1:r(k.hashSync(e,d.substr(0,d.length-31)),d)};k.compare=function(e,d,c,b){function a(a){"string"!==typeof e||"string"!==typeof d?p(a.bind(this,Error("Illegal arguments: "+typeof e+
", "+typeof d))):60!==d.length?p(a.bind(this,null,!1)):k.hash(e,d.substr(0,29),function(b,c){b?a(b):a(null,r(c,d))},b)}if(c){if("function"!==typeof c)throw Error("Illegal callback: "+typeof c);a(c)}else return new Promise(function(b,c){a(function(a,d){a?c(a):b(d)})})};k.getRounds=function(e){if("string"!==typeof e)throw Error("Illegal arguments: "+typeof e);return parseInt(e.split("$")[2],10)};k.getSalt=function(e){if("string"!==typeof e)throw Error("Illegal arguments: "+typeof e);if(60!==e.length)throw Error("Illegal hash length: "+
e.length+" != 60");return e.substring(0,29)};var p="undefined"!==typeof process&&process&&"function"===typeof process.nextTick?"function"===typeof setImmediate?setImmediate:process.nextTick:setTimeout,s="./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789".split(""),q=[-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,0,1,54,55,56,57,58,59,60,61,62,63,-1,-1,-1,-1,-1,-1,-1,2,3,4,5,6,7,8,9,10,11,12,
13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,-1,-1,-1,-1,-1,-1,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,-1,-1,-1,-1,-1],z=String.fromCharCode,I=function(){var e={MAX_CODEPOINT:1114111,encodeUTF8:function(d,c){var b=null;"number"===typeof d&&(b=d,d=function(){return null});for(;null!==b||null!==(b=d());)128>b?c(b&127):(2048>b?c(b>>6&31|192):(65536>b?c(b>>12&15|224):(c(b>>18&7|240),c(b>>12&63|128)),c(b>>6&63|128)),c(b&63|128)),b=null},decodeUTF8:function(d,c){for(var b,
a,f,e,k=function(a){a=a.slice(0,a.indexOf(null));var b=Error(a.toString());b.name="TruncatedError";b.bytes=a;throw b;};null!==(b=d());)if(0===(b&128))c(b);else if(192===(b&224))null===(a=d())&&k([b,a]),c((b&31)<<6|a&63);else if(224===(b&240))null!==(a=d())&&null!==(f=d())||k([b,a,f]),c((b&15)<<12|(a&63)<<6|f&63);else if(240===(b&248))null!==(a=d())&&null!==(f=d())&&null!==(e=d())||k([b,a,f,e]),c((b&7)<<18|(a&63)<<12|(f&63)<<6|e&63);else throw RangeError("Illegal starting byte: "+b);},UTF16toUTF8:function(d,
c){for(var b,a=null;null!==(b=null!==a?a:d());)55296<=b&&57343>=b&&null!==(a=d())&&56320<=a&&57343>=a?(c(1024*(b-55296)+a-56320+65536),a=null):c(b);null!==a&&c(a)},UTF8toUTF16:function(d,c){var b=null;"number"===typeof d&&(b=d,d=function(){return null});for(;null!==b||null!==(b=d());)65535>=b?c(b):(b-=65536,c((b>>10)+55296),c(b%1024+56320)),b=null},encodeUTF16toUTF8:function(d,c){e.UTF16toUTF8(d,function(b){e.encodeUTF8(b,c)})},decodeUTF8toUTF16:function(d,c){e.decodeUTF8(d,function(b){e.UTF8toUTF16(b,
c)})},calculateCodePoint:function(d){return 128>d?1:2048>d?2:65536>d?3:4},calculateUTF8:function(d){for(var c,b=0;null!==(c=d());)b+=e.calculateCodePoint(c);return b},calculateUTF16asUTF8:function(d){var c=0,b=0;e.UTF16toUTF8(d,function(a){++c;b+=e.calculateCodePoint(a)});return[c,b]}};return e}();Date.now=Date.now||function(){return+new Date};var F=[608135816,2242054355,320440878,57701188,2752067618,698298832,137296536,3964562569,1160258022,953160567,3193202383,887688300,3232508343,3380367581,1065670069,
3041331479,2450970073,2306472731],G=[3509652390,2564797868,805139163,3491422135,3101798381,1780907670,3128725573,4046225305,614570311,3012652279,134345442,2240740374,1667834072,1901547113,2757295779,4103290238,227898511,1921955416,1904987480,2182433518,2069144605,3260701109,2620446009,720527379,3318853667,677414384,3393288472,3101374703,2390351024,1614419982,1822297739,2954791486,3608508353,3174124327,2024746970,1432378464,3864339955,2857741204,1464375394,1676153920,1439316330,715854006,3033291828,
289532110,2706671279,2087905683,3018724369,1668267050,732546397,1947742710,3462151702,2609353502,2950085171,1814351708,2050118529,680887927,999245976,1800124847,3300911131,1713906067,1641548236,4213287313,1216130144,1575780402,4018429277,3917837745,3693486850,3949271944,596196993,3549867205,258830323,2213823033,772490370,2760122372,1774776394,2652871518,566650946,4142492826,1728879713,2882767088,1783734482,3629395816,2517608232,2874225571,1861159788,326777828,3124490320,2130389656,2716951837,967770486,
1724537150,2185432712,2364442137,1164943284,2105845187,998989502,3765401048,2244026483,1075463327,1455516326,1322494562,910128902,469688178,1117454909,936433444,3490320968,3675253459,1240580251,122909385,2157517691,634681816,4142456567,3825094682,3061402683,2540495037,79693498,3249098678,1084186820,1583128258,426386531,1761308591,1047286709,322548459,995290223,1845252383,2603652396,3431023940,2942221577,3202600964,3727903485,1712269319,422464435,3234572375,1170764815,3523960633,3117677531,1434042557,
442511882,3600875718,1076654713,1738483198,4213154764,2393238008,3677496056,1014306527,4251020053,793779912,2902807211,842905082,4246964064,1395751752,1040244610,2656851899,3396308128,445077038,3742853595,3577915638,679411651,2892444358,2354009459,1767581616,3150600392,3791627101,3102740896,284835224,4246832056,1258075500,768725851,2589189241,3069724005,3532540348,1274779536,3789419226,2764799539,1660621633,3471099624,4011903706,913787905,3497959166,737222580,2514213453,2928710040,3937242737,1804850592,
3499020752,2949064160,2386320175,2390070455,2415321851,4061277028,2290661394,2416832540,1336762016,1754252060,3520065937,3014181293,791618072,3188594551,3933548030,2332172193,3852520463,3043980520,413987798,3465142937,3030929376,4245938359,2093235073,3534596313,375366246,2157278981,2479649556,555357303,3870105701,2008414854,3344188149,4221384143,3956125452,2067696032,3594591187,2921233993,2428461,544322398,577241275,1471733935,610547355,4027169054,1432588573,1507829418,2025931657,3646575487,545086370,
48609733,2200306550,1653985193,298326376,1316178497,3007786442,2064951626,458293330,2589141269,3591329599,3164325604,727753846,2179363840,146436021,1461446943,4069977195,705550613,3059967265,3887724982,4281599278,3313849956,1404054877,2845806497,146425753,1854211946,1266315497,3048417604,3681880366,3289982499,290971E4,1235738493,2632868024,2414719590,3970600049,1771706367,1449415276,3266420449,422970021,1963543593,2690192192,3826793022,1062508698,1531092325,1804592342,2583117782,2714934279,4024971509,
1294809318,4028980673,1289560198,2221992742,1669523910,35572830,157838143,1052438473,1016535060,1802137761,1753167236,1386275462,3080475397,2857371447,1040679964,2145300060,2390574316,1461121720,2956646967,4031777805,4028374788,33600511,2920084762,1018524850,629373528,3691585981,3515945977,2091462646,2486323059,586499841,988145025,935516892,3367335476,2599673255,2839830854,265290510,3972581182,2759138881,3795373465,1005194799,847297441,406762289,1314163512,1332590856,1866599683,4127851711,750260880,
613907577,1450815602,3165620655,3734664991,3650291728,3012275730,3704569646,1427272223,778793252,1343938022,2676280711,2052605720,1946737175,3164576444,3914038668,3967478842,3682934266,1661551462,3294938066,4011595847,840292616,3712170807,616741398,312560963,711312465,1351876610,322626781,1910503582,271666773,2175563734,1594956187,70604529,3617834859,1007753275,1495573769,4069517037,2549218298,2663038764,504708206,2263041392,3941167025,2249088522,1514023603,1998579484,1312622330,694541497,2582060303,
2151582166,1382467621,776784248,2618340202,3323268794,2497899128,2784771155,503983604,4076293799,907881277,423175695,432175456,1378068232,4145222326,3954048622,3938656102,3820766613,2793130115,2977904593,26017576,3274890735,3194772133,1700274565,1756076034,4006520079,3677328699,720338349,1533947780,354530856,688349552,3973924725,1637815568,332179504,3949051286,53804574,2852348879,3044236432,1282449977,3583942155,3416972820,4006381244,1617046695,2628476075,3002303598,1686838959,431878346,2686675385,
1700445008,1080580658,1009431731,832498133,3223435511,2605976345,2271191193,2516031870,1648197032,4164389018,2548247927,300782431,375919233,238389289,3353747414,2531188641,2019080857,1475708069,455242339,2609103871,448939670,3451063019,1395535956,2413381860,1841049896,1491858159,885456874,4264095073,4001119347,1565136089,3898914787,1108368660,540939232,1173283510,2745871338,3681308437,4207628240,3343053890,4016749493,1699691293,1103962373,3625875870,2256883143,3830138730,1031889488,3479347698,1535977030,
4236805024,3251091107,2132092099,1774941330,1199868427,1452454533,157007616,2904115357,342012276,595725824,1480756522,206960106,497939518,591360097,863170706,2375253569,3596610801,1814182875,2094937945,3421402208,1082520231,3463918190,2785509508,435703966,3908032597,1641649973,2842273706,3305899714,1510255612,2148256476,2655287854,3276092548,4258621189,236887753,3681803219,274041037,1734335097,3815195456,3317970021,1899903192,1026095262,4050517792,356393447,2410691914,3873677099,3682840055,3913112168,
2491498743,4132185628,2489919796,1091903735,1979897079,3170134830,3567386728,3557303409,857797738,1136121015,1342202287,507115054,2535736646,337727348,3213592640,1301675037,2528481711,1895095763,1721773893,3216771564,62756741,2142006736,835421444,2531993523,1442658625,3659876326,2882144922,676362277,1392781812,170690266,3921047035,1759253602,3611846912,1745797284,664899054,1329594018,3901205900,3045908486,2062866102,2865634940,3543621612,3464012697,1080764994,553557557,3656615353,3996768171,991055499,
499776247,1265440854,648242737,3940784050,980351604,3713745714,1749149687,3396870395,4211799374,3640570775,1161844396,3125318951,1431517754,545492359,4268468663,3499529547,1437099964,2702547544,3433638243,2581715763,2787789398,1060185593,1593081372,2418618748,4260947970,69676912,2159744348,86519011,2512459080,3838209314,1220612927,3339683548,133810670,1090789135,1078426020,1569222167,845107691,3583754449,4072456591,1091646820,628848692,1613405280,3757631651,526609435,236106946,48312990,2942717905,
3402727701,1797494240,859738849,992217954,4005476642,2243076622,3870952857,3732016268,765654824,3490871365,2511836413,1685915746,3888969200,1414112111,2273134842,3281911079,4080962846,172450625,2569994100,980381355,4109958455,2819808352,2716589560,2568741196,3681446669,3329971472,1835478071,660984891,3704678404,4045999559,3422617507,3040415634,1762651403,1719377915,3470491036,2693910283,3642056355,3138596744,1364962596,2073328063,1983633131,926494387,3423689081,2150032023,4096667949,1749200295,3328846651,
309677260,2016342300,1779581495,3079819751,111262694,1274766160,443224088,298511866,1025883608,3806446537,1145181785,168956806,3641502830,3584813610,1689216846,3666258015,3200248200,1692713982,2646376535,4042768518,1618508792,1610833997,3523052358,4130873264,2001055236,3610705100,2202168115,4028541809,2961195399,1006657119,2006996926,3186142756,1430667929,3210227297,1314452623,4074634658,4101304120,2273951170,1399257539,3367210612,3027628629,1190975929,2062231137,2333990788,2221543033,2438960610,
1181637006,548689776,2362791313,3372408396,3104550113,3145860560,296247880,1970579870,3078560182,3769228297,1714227617,3291629107,3898220290,166772364,1251581989,493813264,448347421,195405023,2709975567,677966185,3703036547,1463355134,2715995803,1338867538,1343315457,2802222074,2684532164,233230375,2599980071,2000651841,3277868038,1638401717,4028070440,3237316320,6314154,819756386,300326615,590932579,1405279636,3267499572,3150704214,2428286686,3959192993,3461946742,1862657033,1266418056,963775037,
2089974820,2263052895,1917689273,448879540,3550394620,3981727096,150775221,3627908307,1303187396,508620638,2975983352,2726630617,1817252668,1876281319,1457606340,908771278,3720792119,3617206836,2455994898,1729034894,1080033504,976866871,3556439503,2881648439,1522871579,1555064734,1336096578,3548522304,2579274686,3574697629,3205460757,3593280638,3338716283,3079412587,564236357,2993598910,1781952180,1464380207,3163844217,3332601554,1699332808,1393555694,1183702653,3581086237,1288719814,691649499,2847557200,
2895455976,3193889540,2717570544,1781354906,1676643554,2592534050,3230253752,1126444790,2770207658,2633158820,2210423226,2615765581,2414155088,3127139286,673620729,2805611233,1269405062,4015350505,3341807571,4149409754,1057255273,2012875353,2162469141,2276492801,2601117357,993977747,3918593370,2654263191,753973209,36408145,2530585658,25011837,3520020182,2088578344,530523599,2918365339,1524020338,1518925132,3760827505,3759777254,1202760957,3985898139,3906192525,674977740,4174734889,2031300136,2019492241,
3983892565,4153806404,3822280332,352677332,2297720250,60907813,90501309,3286998549,1016092578,2535922412,2839152426,457141659,509813237,4120667899,652014361,1966332200,2975202805,55981186,2327461051,676427537,3255491064,2882294119,3433927263,1307055953,942726286,933058658,2468411793,3933900994,4215176142,1361170020,2001714738,2830558078,3274259782,1222529897,1679025792,2729314320,3714953764,1770335741,151462246,3013232138,1682292957,1483529935,471910574,1539241949,458788160,3436315007,1807016891,
3718408830,978976581,1043663428,3165965781,1927990952,4200891579,2372276910,3208408903,3533431907,1412390302,2931980059,4132332400,1947078029,3881505623,4168226417,2941484381,1077988104,1320477388,886195818,18198404,3786409E3,2509781533,112762804,3463356488,1866414978,891333506,18488651,661792760,1628790961,3885187036,3141171499,876946877,2693282273,1372485963,791857591,2686433993,3759982718,3167212022,3472953795,2716379847,445679433,3561995674,3504004811,3574258232,54117162,3331405415,2381918588,
3769707343,4154350007,1140177722,4074052095,668550556,3214352940,367459370,261225585,2610173221,4209349473,3468074219,3265815641,314222801,3066103646,3808782860,282218597,3406013506,3773591054,379116347,1285071038,846784868,2669647154,3771962079,3550491691,2305946142,453669953,1268987020,3317592352,3279303384,3744833421,2610507566,3859509063,266596637,3847019092,517658769,3462560207,3443424879,370717030,4247526661,2224018117,4143653529,4112773975,2788324899,2477274417,1456262402,2901442914,1517677493,
1846949527,2295493580,3734397586,2176403920,1280348187,1908823572,3871786941,846861322,1172426758,3287448474,3383383037,1655181056,3139813346,901632758,1897031941,2986607138,3066810236,3447102507,1393639104,373351379,950779232,625454576,3124240540,4148612726,2007998917,544563296,2244738638,2330496472,2058025392,1291430526,424198748,50039436,29584100,3605783033,2429876329,2791104160,1057563949,3255363231,3075367218,3463963227,1469046755,985887462],E=[1332899944,1700884034,1701343084,1684370003,1668446532,
1869963892];k.encodeBase64=x;k.decodeBase64=B;return k});




$(document).ready(function() {
    //$("#publishBtn").click(function(){
    //});

    function generateRandomCode(length) {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var code = '';
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            code += characters.charAt(randomIndex);
        }
        return code;
    }

    function getIPAddress() {
        $.ajax({
            url: '/php/get_ip.php', // Server-side script
            type: 'GET',
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error getting IP address:', error);
            }
        });
    }
    getIPAddress();

    $("#publishBtn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $.post('/php/verif.php', function(data) {
                
            $('#res_reg').text(data);
        });
    });

    $("#enterranse").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $('#popup-back').toggle();
    });
    
    $("#popup-close").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $('#popup-back').toggle();
    });
    $('#user-input-code').toggle();
    $("#send_mail_reg").toggle();
    $('#form_for_reg').toggle();
    $("#send_mail").on('click',function(){
       
        var email_get = $("#user-input-registr").val();
        if(!email_get){
            $("#details_registr").text("Графа с андресом почты не должно быть пустым");
        } else {
            $.post('/php/get_preregistr_email.php', {email:email_get}, function(data) {
                var output = $.parseJSON(data);
                //console.log(output);
                if(output){
                    console.log("Find:" + output);
                    $("#details_registr").text("На данную почту уже было отправленно сообщение с кодом регистрации. Проверьте почту или обратитесь к администратору сайта.");
                    $("#send_mail").toggle();
                    //$("#user-input-registr").toggle();
                    $('#user-input-code').toggle();
                    $("#send_mail_reg").toggle();
                } else {
                    var split_email = email_get.split("@");
                    console.log(split_email[1]);
                    if(!split_email[1]){
                        $("#details_registr").text("Адрес почты должен содержать символ @...");
                    }else {
                        
                        $("#user-input-registr").toggle();
                        $("#send_mail").toggle();
                        $("#details_registr").text("Отправка сообщения на указанную почту...");
                        var code = generateRandomCode(8);
                        console.log(code);
                        $.post('/php/python_send.php',{mail:email_get, code:code}, function(data) {   
                            
                            if(data == 'Error'){
                                $("#details_registr").text("Ошибка отправки сообщения!!!");
                                $("#user-input-registr").toggle();
                                $("#send_mail").toggle();
                            }else{
                                //console.log(data);
                                var dNow = new Date();
                                var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
                                $.post('/php/create_preregistr.php', {email:email_get, code:code, create_at:localdate }, function(data) {
                                    if(data == 'OK'){
                                        $("#details_registr").text("Сообщение отправлено! Введите код из сообщения.");
                                        $("#user-input-registr").toggle();
                                        $('#user-input-code').toggle();
                                        $("#send_mail_reg").toggle();
                                    }else{
                                        $("#details_registr").text("Ошибка отправки сообщения!!!");
                                        $("#user-input-registr").toggle();
                                        $("#send_mail").toggle();
                                    }
                                    console.log(data);
                                });
    
                            }
                        });
                    }
                    
                }
            });


        }

        //alert("Send email");
    });
    $("#registr_push").on('click', function(){
        $("#details_registr").text("Регистрация пользователя");
        $('#popup-back').toggle();
        $('#popup-back-login').toggle();
    });
    $("#send_mail_reg").on('click',function(){
        var email_get = $("#user-input-registr").val();
        var code_get = $("#user-input-code").val();
        $.post('/php/get_preregistr_email.php', {email:email_get}, function(data) {
            var output = $.parseJSON(data);
            //console.log(output);
            if(output){
                if(code_get == output[2]){
                    //console.log(output[2]);
                    var split_email = output[1].split("@");
                    var roles = 'nullbody';
                    //console.log(split_email[1]);
                    var formData = {
                        name: split_email[0],
                        email: output[1],
                        password: output[2],
                        roles: roles
                    };
                    console.log(split_email[0]);
                    console.log(output[1]);
                    console.log(output[2]);
                    console.log(roles);
                    var salt = bcrypt.genSaltSync(10);
                    var hashedPassword = bcrypt.hashSync(output[2], salt);
                    console.log(hashedPassword);

                    $.post('/php/users_finish_reg.php', { name:split_email[0] ,email:output[1] ,email_verified_at:null ,password:hashedPassword ,remember_token:null ,created_at:null,updated_at:null }, function(data) {
                        console.log(data);
                    });
                    /*var url = "users.store";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            alert(response.message);
                            console.log(response.user);
                        },
                        error: function(xhr, status, error) {
                            var errors = xhr.responseJSON.errors;
                            var errorString = '';
                            $.each(errors, function(key, value) {
                                errorString += value + '\n';
                            });
                            console.log(errorString);
                        }
                    });*/
                }
            }else{}
        });
    });

    //$("#top-menu-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        //alert("Button clicked!");
    //});
});

window.glist = function(){ 
    alert("Global func");
    return 0;
}