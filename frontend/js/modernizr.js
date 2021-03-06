window.Modernizr = (function(A, c, g) {
    var J = "2.6.2", w = {}, y = true, M = c.documentElement, a = "modernizr", I = c.createElement(a), E = I.style, L = c.createElement("input"), C = ":)", b = {}.toString, j = " -webkit- -moz- -o- -ms- ".split(" "), h = "Webkit Moz O ms", F = h.split(" "), K = h.toLowerCase().split(" "), H = {svg: "http://www.w3.org/2000/svg"}, l = {}, p = {}, f = {}, e = [], k = e.slice, s, n = function(V, X, P, W) {
        var O, U, R, S, N = c.createElement("div"), T = c.body, Q = T || c.createElement("body");
        if (parseInt(P, 10)) {
            while (P--) {
                R = c.createElement("div");
                R.id = W ? W[P] : a + (P + 1);
                N.appendChild(R)
            }
        }
        O = ["&#173;", '<style id="s', a, '">', V, "</style>"].join("");
        N.id = a;
        (T ? N : Q).innerHTML += O;
        Q.appendChild(N);
        if (!T) {
            Q.style.background = "";
            Q.style.overflow = "hidden";
            S = M.style.overflow;
            M.style.overflow = "hidden";
            M.appendChild(Q)
        }
        U = X(N, V);
        if (!T) {
            Q.parentNode.removeChild(Q);
            M.style.overflow = S
        } else {
            N.parentNode.removeChild(N)
        }
        return !!U
    }, G = function(P) {
        var O = A.matchMedia || A.msMatchMedia;
        if (O) {
            return O(P).matches
        }
        var N;
        n("@media " + P + " { #" + a + " { position: absolute; } }", function(Q) {
            N = (A.getComputedStyle ? getComputedStyle(Q, null) : Q.currentStyle)["position"] == "absolute"
        });
        return N
    }, o = (function() {
        var O = {select: "input", change: "input", submit: "form", reset: "form", error: "img", load: "img", abort: "img"};
        function N(P, R) {
            R = R || c.createElement(O[P] || "div");
            P = "on" + P;
            var Q = P in R;
            if (!Q) {
                if (!R.setAttribute) {
                    R = c.createElement("div")
                }
                if (R.setAttribute && R.removeAttribute) {
                    R.setAttribute(P, "");
                    Q = r(R[P], "function");
                    if (!r(R[P], "undefined")) {
                        R[P] = g
                    }
                    R.removeAttribute(P)
                }
            }
            R = null;
            return Q
        }
        return N
    })(), i = ({}).hasOwnProperty, x;
    if (!r(i, "undefined") && !r(i.call, "undefined")) {
        x = function(N, O) {
            return i.call(N, O)
        }
    } else {
        x = function(N, O) {
            return((O in N) && r(N.constructor.prototype[O], "undefined"))
        }
    }
    if (!Function.prototype.bind) {
        Function.prototype.bind = function d(P) {
            var Q = this;
            if (typeof Q != "function") {
                throw new TypeError()
            }
            var N = k.call(arguments, 1), O = function() {
                if (this instanceof O) {
                    var T = function() {
                    };
                    T.prototype = Q.prototype;
                    var S = new T();
                    var R = Q.apply(S, N.concat(k.call(arguments)));
                    if (Object(R) === R) {
                        return R
                    }
                    return S
                } else {
                    return Q.apply(P, N.concat(k.call(arguments)))
                }
            };
            return O
        }
    }
    function D(N) {
        E.cssText = N
    }
    function u(O, N) {
        return D(j.join(O + ";") + (N || ""))
    }
    function r(O, N) {
        return typeof O === N
    }
    function t(O, N) {
        return !!~("" + O).indexOf(N)
    }
    function z(P, N) {
        for (var O in P) {
            var Q = P[O];
            if (!t(Q, "-") && E[Q] !== g) {
                return N == "pfx" ? Q : true
            }
        }
        return false
    }
    function q(O, R, Q) {
        for (var N in O) {
            var P = R[O[N]];
            if (P !== g) {
                if (Q === false) {
                    return O[N]
                }
                if (r(P, "function")) {
                    return P.bind(Q || R)
                }
                return P
            }
        }
        return false
    }
    function m(R, N, Q) {
        var O = R.charAt(0).toUpperCase() + R.slice(1), P = (R + " " + F.join(O + " ") + O).split(" ");
        if (r(N, "string") || r(N, "undefined")) {
            return z(P, N)
        } else {
            P = (R + " " + (K).join(O + " ") + O).split(" ");
            return q(P, N, Q)
        }
    }
    l.flexbox = function() {
        return m("flexWrap")
    };
    l.flexboxlegacy = function() {
        return m("boxDirection")
    };
    l.canvas = function() {
        var N = c.createElement("canvas");
        return !!(N.getContext && N.getContext("2d"))
    };
    l.canvastext = function() {
        return !!(w.canvas && r(c.createElement("canvas").getContext("2d").fillText, "function"))
    };
    l.webgl = function() {
        return !!A.WebGLRenderingContext
    };
    l.touch = function() {
        var N;
        if (("ontouchstart" in A) || A.DocumentTouch && c instanceof DocumentTouch) {
            N = true
        } else {
            n(["@media (", j.join("touch-enabled),("), a, ")", "{#modernizr{top:9px;position:absolute}}"].join(""), function(O) {
                N = O.offsetTop === 9
            })
        }
        return N
    };
    l.geolocation = function() {
        return"geolocation" in navigator
    };
    l.postmessage = function() {
        return !!A.postMessage
    };
    l.websqldatabase = function() {
        return !!A.openDatabase
    };
    l.indexedDB = function() {
        return !!m("indexedDB", A)
    };
    l.hashchange = function() {
        return o("hashchange", A) && (c.documentMode === g || c.documentMode > 7)
    };
    l.history = function() {
        return !!(A.history && history.pushState)
    };
    l.draganddrop = function() {
        var N = c.createElement("div");
        return("draggable" in N) || ("ondragstart" in N && "ondrop" in N)
    };
    l.websockets = function() {
        return"WebSocket" in A || "MozWebSocket" in A
    };
    l.rgba = function() {
        D("background-color:rgba(150,255,150,.5)");
        return t(E.backgroundColor, "rgba")
    };
    l.hsla = function() {
        D("background-color:hsla(120,40%,100%,.5)");
        return t(E.backgroundColor, "rgba") || t(E.backgroundColor, "hsla")
    };
    l.multiplebgs = function() {
        D("background:url(https://),url(https://),red url(https://)");
        return(/(url\s*\(.*?){3}/).test(E.background)
    };
    l.backgroundsize = function() {
        return m("backgroundSize")
    };
    l.borderimage = function() {
        return m("borderImage")
    };
    l.borderradius = function() {
        return m("borderRadius")
    };
    l.boxshadow = function() {
        return m("boxShadow")
    };
    l.textshadow = function() {
        return c.createElement("div").style.textShadow === ""
    };
    l.opacity = function() {
        u("opacity:.55");
        return(/^0.55$/).test(E.opacity)
    };
    l.cssanimations = function() {
        return m("animationName")
    };
    l.csscolumns = function() {
        return m("columnCount")
    };
    l.cssgradients = function() {
        var P = "background-image:", O = "gradient(linear,left top,right bottom,from(#9f9),to(white));", N = "linear-gradient(left top,#9f9, white);";
        D((P + "-webkit- ".split(" ").join(O + P) + j.join(N + P)).slice(0, -P.length));
        return t(E.backgroundImage, "gradient")
    };
    l.cssreflections = function() {
        return m("boxReflect")
    };
    l.csstransforms = function() {
        return !!m("transform")
    };
    l.csstransforms3d = function() {
        var N = !!m("perspective");
        if (N && "webkitPerspective" in M.style) {
            n("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}", function(O, P) {
                N = O.offsetLeft === 9 && O.offsetHeight === 3
            })
        }
        return N
    };
    l.csstransitions = function() {
        return m("transition")
    };
    l.fontface = function() {
        var N;
        n('@font-face {font-family:"font";src:url("https://")}', function(R, S) {
            var Q = c.getElementById("smodernizr"), O = Q.sheet || Q.styleSheet, P = O ? (O.cssRules && O.cssRules[0] ? O.cssRules[0].cssText : O.cssText || "") : "";
            N = /src/i.test(P) && P.indexOf(S.split(" ")[0]) === 0
        });
        return N
    };
    l.generatedcontent = function() {
        var N;
        n(["#", a, "{font:0/0 a}#", a, ':after{content:"', C, '";visibility:hidden;font:3px/1 a}'].join(""), function(O) {
            N = O.offsetHeight >= 3
        });
        return N
    };
    l.video = function() {
        var O = c.createElement("video"), N = false;
        try {
            if (N = !!O.canPlayType) {
                N = new Boolean(N);
                N.ogg = O.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, "");
                N.h264 = O.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, "");
                N.webm = O.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, "")
            }
        } catch (P) {
        }
        return N
    };
    l.audio = function() {
        var O = c.createElement("audio"), N = false;
        try {
            if (N = !!O.canPlayType) {
                N = new Boolean(N);
                N.ogg = O.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/, "");
                N.mp3 = O.canPlayType("audio/mpeg;").replace(/^no$/, "");
                N.wav = O.canPlayType('audio/wav; codecs="1"').replace(/^no$/, "");
                N.m4a = (O.canPlayType("audio/x-m4a;") || O.canPlayType("audio/aac;")).replace(/^no$/, "")
            }
        } catch (P) {
        }
        return N
    };
    l.localstorage = function() {
        try {
            localStorage.setItem(a, a);
            localStorage.removeItem(a);
            return true
        } catch (N) {
            return false
        }
    };
    l.sessionstorage = function() {
        try {
            sessionStorage.setItem(a, a);
            sessionStorage.removeItem(a);
            return true
        } catch (N) {
            return false
        }
    };
    l.webworkers = function() {
        return !!A.Worker
    };
    l.applicationcache = function() {
        return !!A.applicationCache
    };
    l.svg = function() {
        return !!c.createElementNS && !!c.createElementNS(H.svg, "svg").createSVGRect
    };
    l.inlinesvg = function() {
        var N = c.createElement("div");
        N.innerHTML = "<svg/>";
        return(N.firstChild && N.firstChild.namespaceURI) == H.svg
    };
    l.smil = function() {
        return !!c.createElementNS && /SVGAnimate/.test(b.call(c.createElementNS(H.svg, "animate")))
    };
    l.svgclippaths = function() {
        return !!c.createElementNS && /SVGClipPath/.test(b.call(c.createElementNS(H.svg, "clipPath")))
    };
    function B() {
        w.input = (function(P) {
            for (var O = 0, N = P.length; O < N; O++) {
                f[P[O]] = !!(P[O] in L)
            }
            if (f.list) {
                f.list = !!(c.createElement("datalist") && A.HTMLDataListElement)
            }
            return f
        })("autocomplete autofocus list placeholder max min multiple pattern required step".split(" "));
        w.inputtypes = (function(Q) {
            for (var P = 0, O, S, R, N = Q.length; P < N; P++) {
                L.setAttribute("type", S = Q[P]);
                O = L.type !== "text";
                if (O) {
                    L.value = C;
                    L.style.cssText = "position:absolute;visibility:hidden;";
                    if (/^range$/.test(S) && L.style.WebkitAppearance !== g) {
                        M.appendChild(L);
                        R = c.defaultView;
                        O = R.getComputedStyle && R.getComputedStyle(L, null).WebkitAppearance !== "textfield" && (L.offsetHeight !== 0);
                        M.removeChild(L)
                    } else {
                        if (/^(search|tel)$/.test(S)) {
                        } else {
                            if (/^(url|email)$/.test(S)) {
                                O = L.checkValidity && L.checkValidity() === false
                            } else {
                                O = L.value != C
                            }
                        }
                    }
                }
                p[Q[P]] = !!O
            }
            return p
        })("search tel url email datetime date month week time datetime-local number range color".split(" "))
    }
    for (var v in l) {
        if (x(l, v)) {
            s = v.toLowerCase();
            w[s] = l[v]();
            e.push((w[s] ? "" : "no-") + s)
        }
    }
    w.input || B();
    w.addTest = function(O, P) {
        if (typeof O == "object") {
            for (var N in O) {
                if (x(O, N)) {
                    w.addTest(N, O[N])
                }
            }
        } else {
            O = O.toLowerCase();
            if (w[O] !== g) {
                return w
            }
            P = typeof P == "function" ? P() : P;
            if (typeof y !== "undefined" && y) {
                M.className += " " + (P ? "" : "no-") + O
            }
            w[O] = P
        }
        return w
    };
    D("");
    I = L = null;
    (function(W, Y) {
        var Q = W.html5 || {};
        var T = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i;
        var O = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i;
        var ac;
        var U = "_html5shiv";
        var N = 0;
        var aa = {};
        var R;
        (function() {
            try {
                var af = Y.createElement("a");
                af.innerHTML = "<xyz></xyz>";
                ac = ("hidden" in af);
                R = af.childNodes.length == 1 || (function() {
                    (Y.createElement)("a");
                    var ah = Y.createDocumentFragment();
                    return(typeof ah.cloneNode == "undefined" || typeof ah.createDocumentFragment == "undefined" || typeof ah.createElement == "undefined")
                }())
            } catch (ag) {
                ac = true;
                R = true
            }
        }());
        function S(af, ah) {
            var ai = af.createElement("p"), ag = af.getElementsByTagName("head")[0] || af.documentElement;
            ai.innerHTML = "x<style>" + ah + "</style>";
            return ag.insertBefore(ai.lastChild, ag.firstChild)
        }
        function X() {
            var af = V.elements;
            return typeof af == "string" ? af.split(" ") : af
        }
        function ab(af) {
            var ag = aa[af[U]];
            if (!ag) {
                ag = {};
                N++;
                af[U] = N;
                aa[N] = ag
            }
            return ag
        }
        function Z(ai, af, ah) {
            if (!af) {
                af = Y
            }
            if (R) {
                return af.createElement(ai)
            }
            if (!ah) {
                ah = ab(af)
            }
            var ag;
            if (ah.cache[ai]) {
                ag = ah.cache[ai].cloneNode()
            } else {
                if (O.test(ai)) {
                    ag = (ah.cache[ai] = ah.createElem(ai)).cloneNode()
                } else {
                    ag = ah.createElem(ai)
                }
            }
            return ag.canHaveChildren && !T.test(ai) ? ah.frag.appendChild(ag) : ag
        }
        function ad(ah, aj) {
            if (!ah) {
                ah = Y
            }
            if (R) {
                return ah.createDocumentFragment()
            }
            aj = aj || ab(ah);
            var ak = aj.frag.cloneNode(), ai = 0, ag = X(), af = ag.length;
            for (; ai < af; ai++) {
                ak.createElement(ag[ai])
            }
            return ak
        }
        function ae(af, ag) {
            if (!ag.cache) {
                ag.cache = {};
                ag.createElem = af.createElement;
                ag.createFrag = af.createDocumentFragment;
                ag.frag = ag.createFrag()
            }
            af.createElement = function(ah) {
                if (!V.shivMethods) {
                    return ag.createElem(ah)
                }
                return Z(ah, af, ag)
            };
            af.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + X().join().replace(/\w+/g, function(ah) {
                ag.createElem(ah);
                ag.frag.createElement(ah);
                return'c("' + ah + '")'
            }) + ");return n}")(V, ag.frag)
        }
        function P(af) {
            if (!af) {
                af = Y
            }
            var ag = ab(af);
            if (V.shivCSS && !ac && !ag.hasCSS) {
                ag.hasCSS = !!S(af, "article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")
            }
            if (!R) {
                ae(af, ag)
            }
            return af
        }
        var V = {elements: Q.elements || "abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video", shivCSS: (Q.shivCSS !== false), supportsUnknownElements: R, shivMethods: (Q.shivMethods !== false), type: "default", shivDocument: P, createElement: Z, createDocumentFragment: ad};
        W.html5 = V;
        P(Y)
    }(this, c));
    w._version = J;
    w._prefixes = j;
    w._domPrefixes = K;
    w._cssomPrefixes = F;
    w.mq = G;
    w.hasEvent = o;
    w.testProp = function(N) {
        return z([N])
    };
    w.testAllProps = m;
    w.testStyles = n;
    M.className = M.className.replace(/(^|\s)no-js(\s|$)/, "$1$2") + (y ? " js " + e.join(" ") : "");
    return w
})(this, this.document);
(function(ad, ac, ab) {
    function aa(b) {
        return"[object Function]" == P.call(b)
    }
    function Z(b) {
        return"string" == typeof b
    }
    function Y() {
    }
    function X(b) {
        return !b || "loaded" == b || "complete" == b || "uninitialized" == b
    }
    function W() {
        var b = O.shift();
        M = 1, b ? b.t ? R(function() {
            ("c" == b.t ? L.injectCss : L.injectJs)(b.s, 0, b.a, b.x, b.e, 1)
        }, 0) : (b(), W()) : M = 0
    }
    function V(w, v, t, s, q, p, n) {
        function m(a) {
            if (!g && X(h.readyState) && (x.r = g = 1, !M && W(), h.onload = h.onreadystatechange = null, a)) {
                "img" != w && R(function() {
                    I.removeChild(h)
                }, 50);
                for (var c in D[v]) {
                    D[v].hasOwnProperty(c) && D[v][c].onload()
                }
            }
        }
        var n = n || L.errorTimeout, h = ac.createElement(w), g = 0, b = 0, x = {t: t, s: v, e: q, a: p, x: n};
        1 === D[v] && (b = 1, D[v] = []), "object" == w ? h.data = v : (h.src = v, h.type = w), h.width = h.height = "0", h.onerror = h.onload = h.onreadystatechange = function() {
            m.call(this, b)
        }, O.splice(s, 0, x), "img" != w && (b || 2 === D[v] ? (I.insertBefore(h, J ? null : Q), R(m, n)) : D[v].push(h))
    }
    function U(g, e, j, i, h) {
        return M = 0, e = e || "j", Z(g) ? V("c" == e ? G : H, g, e, this.i++, j, i, h) : (O.splice(this.i++, 0, g), 1 == O.length && W()), this
    }
    function T() {
        var b = L;
        return b.loader = {load: U, i: 0}, b
    }
    var S = ac.documentElement, R = ad.setTimeout, Q = ac.getElementsByTagName("script")[0], P = {}.toString, O = [], M = 0, K = "MozAppearance" in S.style, J = K && !!ac.createRange().compareNode, I = J ? S : Q.parentNode, S = ad.opera && "[object Opera]" == P.call(ad.opera), S = !!ac.attachEvent && !S, H = K ? "object" : S ? "script" : "img", G = S ? "script" : H, F = Array.isArray || function(b) {
        return"[object Array]" == P.call(b)
    }, E = [], D = {}, C = {timeout: function(d, c) {
            return c.length && (d.timeout = c[0]), d
        }}, N, L;
    L = function(e) {
        function c(i) {
            var i = i.split("!"), h = E.length, q = i.pop(), p = i.length, q = {url: q, origUrl: q, prefixes: i}, o, l, j;
            for (l = 0; l < p; l++) {
                j = i[l].split("="), (o = C[j.shift()]) && (q = o(q, j))
            }
            for (l = 0; l < h; l++) {
                q = E[l](q)
            }
            return q
        }
        function n(b, s, r, q, p) {
            var o = c(b), l = o.autoCallback;
            o.url.split(".").pop().split("?").shift(), o.bypass || (s && (s = aa(s) ? s : s[b] || s[q] || s[b.split("/").pop().split("?")[0]]), o.instead ? o.instead(b, s, r, q, p) : (D[o.url] ? o.noexec = !0 : D[o.url] = 1, r.load(o.url, o.forceCSS || !o.forceJS && "css" == o.url.split(".").pop().split("?").shift() ? "c" : ab, o.noexec, o.attrs, o.timeout), (aa(s) || aa(l)) && r.load(function() {
                T(), s && s(o.origUrl, p, q), l && l(o.origUrl, p, q), D[o.url] = 2
            })))
        }
        function m(w, v) {
            function u(b, h) {
                if (b) {
                    if (Z(b)) {
                        h || (r = function() {
                            var i = [].slice.call(arguments);
                            q.apply(this, i), p()
                        }), n(b, r, v, 0, t)
                    } else {
                        if (Object(b) === b) {
                            for (g in o = function() {
                                var a = 0, i;
                                for (i in b) {
                                    b.hasOwnProperty(i) && a++
                                }
                                return a
                            }(), b) {
                                b.hasOwnProperty(g) && (!h && !--o && (aa(r) ? r = function() {
                                    var i = [].slice.call(arguments);
                                    q.apply(this, i), p()
                                } : r[g] = function(i) {
                                    return function() {
                                        var a = [].slice.call(arguments);
                                        i && i.apply(this, a), p()
                                    }
                                }(q[g])), n(b[g], r, v, g, t))
                            }
                        }
                    }
                } else {
                    !h && p()
                }
            }
            var t = !!w.test, s = w.load || w.both, r = w.callback || Y, q = r, p = w.complete || Y, o, g;
            u(t ? w.yep : w.nope, !!s), s && u(s)
        }
        var k, f, d = this.yepnope.loader;
        if (Z(e)) {
            n(e, 0, d, 0)
        } else {
            if (F(e)) {
                for (k = 0; k < e.length; k++) {
                    f = e[k], Z(f) ? n(f, 0, d, 0) : F(f) ? L(f) : Object(f) === f && m(f, d)
                }
            } else {
                Object(e) === e && m(e, d)
            }
        }
    }, L.addPrefix = function(d, c) {
        C[d] = c
    }, L.addFilter = function(b) {
        E.push(b)
    }, L.errorTimeout = 10000, null == ac.readyState && ac.addEventListener && (ac.readyState = "loading", ac.addEventListener("DOMContentLoaded", N = function() {
        ac.removeEventListener("DOMContentLoaded", N, 0), ac.readyState = "complete"
    }, 0)), ad.yepnope = T(), ad.yepnope.executeStack = W, ad.yepnope.injectJs = function(r, q, p, n, m, h) {
        var g = ac.createElement("script"), f, b, n = n || L.errorTimeout;
        g.src = r;
        for (b in p) {
            g.setAttribute(b, p[b])
        }
        q = h ? W : q || Y, g.onreadystatechange = g.onload = function() {
            !f && X(g.readyState) && (f = 1, q(), g.onload = g.onreadystatechange = null)
        }, R(function() {
            f || (f = 1, q(1))
        }, n), m ? g.onload() : Q.parentNode.insertBefore(g, Q)
    }, ad.yepnope.injectCss = function(b, n, m, l, k, h) {
        var l = ac.createElement("link"), f, n = h ? W : n || Y;
        l.href = b, l.rel = "stylesheet", l.type = "text/css";
        for (f in m) {
            l.setAttribute(f, m[f])
        }
        k || (Q.parentNode.insertBefore(l, Q), R(n, 0))
    }
})(this, document);
Modernizr.load = function() {
    yepnope.apply(window, [].slice.call(arguments, 0))
};
(function() {
    Modernizr.addTest("media-queries", Modernizr.mq("only all"));
    Modernizr.addTest("box-sizing", function() {
        return Modernizr.testAllProps("boxSizing") && (document.documentMode === undefined || document.documentMode > 7)
    });
    Modernizr.addTest("rgba", function() {
        var b = document.createElement("div");
        var a = b.style;
        a.cssText = "background-color:rgba(150,255,150,.5)";
        return("" + a.backgroundColor).indexOf("rgba") > -1
    })
}());