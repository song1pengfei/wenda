var T, baidu = T = function () {
    var e, t = e = t || function (e, n) {
        return t.dom ? t.dom(e, n) : null
    };
    t.version = "2.0.2.1", t.guid = "$BAIDU$", t.key = "tangram_guid";
    var n = window[t.guid] = window[t.guid] || {};
    return(n.versions || (n.versions = [])).push(t.version), t.check = t.check || function () {
    }, t.lang = t.lang || {}, t.forEach = function (e, t, n) {
        var r, o, i;
        if ("function" == typeof t && e)if (o = "number" == typeof e.length ? e.length : e.byteLength, "number" == typeof o) {
            if ("[object Function]" === Object.prototype.toString.call(e))return e;
            for (r = 0; o > r; r++)i = e[r] || e.charAt && e.charAt(r), t.call(n || null, i, r, e)
        } else if ("number" == typeof e)for (r = 0; e > r; r++)t.call(n || null, r, r, r); else if ("object" == typeof e)for (r in e)e.hasOwnProperty(r) && t.call(n || null, e[r], r, e);
        return e
    }, t.type = function () {
        var e = {}, n = [, "HTMLElement", "Attribute", "Text", , , , , "Comment", "Document", , "DocumentFragment"], r = "Array Boolean Date Error Function Number RegExp String", o = {object: 1, "function": "1"}, i = e.toString;
        return t.forEach(r.split(" "), function (n) {
            e["[object " + n + "]"] = n.toLowerCase(), t["is" + n] = function (e) {
                return t.type(e) == n.toLowerCase()
            }
        }), function (t) {
            var r = typeof t;
            return o[r] ? null == t ? "null" : t._type_ || e[i.call(t)] || n[t.nodeType] || (t == t.window ? "Window" : "") || "object" : r
        }
    }(), t.isDate = function (e) {
        return"date" == t.type(e) && "Invalid Date" != "" + e && !isNaN(e)
    }, t.isElement = function (e) {
        return"HTMLElement" == t.type(e)
    }, t.isEnumerable = function (e) {
        return null != e && ("object" == typeof e || ~Object.prototype.toString.call(e).indexOf("NodeList")) && ("number" == typeof e.length || "number" == typeof e.byteLength || e[0] !== void 0)
    }, t.isNumber = function (e) {
        return"number" == t.type(e) && isFinite(e)
    }, t.isPlainObject = function (e) {
        var n, r = Object.prototype.hasOwnProperty;
        if ("object" != t.type(e))return!1;
        if (e.constructor && !r.call(e, "constructor") && !r.call(e.constructor.prototype, "isPrototypeOf"))return!1;
        for (n in e);
        return void 0 === n || r.call(e, n)
    }, t.isObject = function (e) {
        return"function" == typeof e || "object" == typeof e && null != e
    }, t.extend = function (e, n) {
        var r, o, i, a, s, u, c = 1, l = arguments.length, f = e || {};
        for (t.isBoolean(e) && (c = 2) && (f = n || {}), !t.isObject(f) && (f = {}); l > c; c++)if (r = arguments[c], t.isObject(r))for (o in r)i = f[o], a = r[o], i !== a && (t.isBoolean(e) && e && a && (t.isPlainObject(a) || (s = t.isArray(a))) ? (s ? (s = !1, u = i && t.isArray(i) ? i : []) : u = i && t.isPlainObject(i) ? i : {}, f[o] = t.extend(e, u, a)) : void 0 !== a && (f[o] = a));
        return f
    }, t.createChain = function (e, n, r) {
        var o = "dom" == e ? "$DOM" : "$" + e.charAt(0).toUpperCase() + e.substr(1), i = Array.prototype.slice, a = t[e] = t[e] || n || function (n) {
            return t.extend(n, t[e].fn)
        };
        return a.extend = function (n) {
            var r;
            for (r in n)"splice" != r && (a[r] = function () {
                var n = arguments[0];
                "dom" == e && "string" == t.type(n) && (n = "#" + n);
                var o = a(n), s = o[r].apply(o, i.call(arguments, 1));
                return"$DOM" == t.type(s) ? s.get(0) : s
            });
            return t.extend(t[e].fn, n)
        }, t[e][o] = t[e][o] || r || function () {
        }, a.fn = t[e][o].prototype, a
    }, t.overwrite = function (e, t, n) {
        for (var r = t.length - 1; r > -1; r--)e.prototype[t[r]] = n(t[r]);
        return e
    }, t.object = t.object || {}, t.object.isPlain = t.isPlainObject, t.createChain("string", function (e) {
        var n = t.type(e), r = new String(~"string|number".indexOf(n) ? e : n), o = String.prototype;
        return t.forEach(t.string.$String.prototype, function (e, t) {
            o[t] || (r[t] = e)
        }), r
    }), t.string.extend({trim: function () {
        var e = RegExp("(^[\\s\\t\\xa0\\u3000]+)|([\\u3000\\xa0\\s\\t]+$)", "g");
        return function () {
            return this.replace(e, "")
        }
    }()}), t.createChain("array", function (e) {
        var n, r = t.array.$Array.prototype;
        Array.prototype, "array" != t.type(e) && (e = []);
        for (n in r)e[n] = r[n];
        return e
    }), t.overwrite(t.array.$Array, "concat slice".split(" "), function (e) {
        return function () {
            return t.array(Array.prototype[e].apply(this, arguments))
        }
    }), t.array.extend({indexOf: function (e, n) {
        t.check(".+(,number)?", "baidu.array.indexOf");
        var r = this.length;
        for (0 > (n = 0 | n) && (n = Math.max(0, r + n)); r > n; n++)if (n in this && this[n] === e)return n;
        return-1
    }}), t.createChain("Callbacks", function (e) {
        var n = e;
        return"string" === t.type(e) && (n = {}, t.forEach(e.split(/\s/), function (e) {
            n[e] = !0
        })), new t.Callbacks.$Callbacks(n)
    }, function (e) {
        var n, r, o, i, a = t.extend({}, e || {}), s = [], u = [], c = 0, l = function (e, t) {
            var r, l;
            if (u && s && (n = a.memory && e, o = !0, u.push(e), !i)) {
                for (i = !0; r = u.shift();)for (c = t || 0; l = s[c]; c++)if (l.apply(r[0], r[1]) === !1 && a.stopOnFalse) {
                    n = !1;
                    break
                }
                i = !1, a.once && (s = [])
            }
        }, f = {add: function () {
            if (!s)return this;
            var e = s && s.length;
            return function r(e) {
                for (var n, o, o, i = e.length, u = 0; i > u; u++)(o = e[u]) && (n = t.type(o), "function" === n ? (!a.unique || !f.has(o)) && s.push(o) : o && o.length && "string" !== n && r(o))
            }(arguments), !i && n && l(n, e), this
        }, remove: function () {
            if (!s)return this;
            var e;
            return t.forEach(arguments, function (n) {
                for (; (e = t.array(s).indexOf(n)) > -1;)s.splice(e, 1), i && c > e && c--
            }), this
        }, has: function (e) {
            return t.array(s).indexOf(e) > -1
        }, empty: function () {
            return s = [], this
        }, disable: function () {
            return s = u = n = void 0, this
        }, disabled: function () {
            return!s
        }, lock: function () {
            return r = !0, !n && f.disable(), this
        }, fired: function () {
            return o
        }, fireWith: function (e, t) {
            return o && a.once || r ? this : (t = t || [], t = [e, t.slice ? t.slice() : t], l(t), this)
        }, fire: function () {
            return f.fireWith(this, arguments), this
        }};
        return f
    }), t.createChain("Deferred", function (e) {
        return new t.Deferred.$Deferred(e)
    }, function (e) {
        var n = this, r = "pending", o = [
            ["resolve", "done", t.Callbacks("once memory"), "resolved"],
            ["reject", "fail", t.Callbacks("once memory"), "rejected"],
            ["notify", "progress", t.Callbacks("memory")]
        ], i = {state: function () {
            return r
        }, always: function () {
            return n.done(arguments).fail(arguments), this
        }, then: function () {
            var e = arguments;
            return t.Deferred(function (r) {
                t.forEach(o, function (o, i) {
                    var a = o[0], s = e[i];
                    n[o[1]]("function" === t.type(s) ? function () {
                        var e = s.apply(this, arguments);
                        e && "function" === t.type(e.promise) ? e.promise().done(r.resolve).fail(r.reject).progress(r.notify) : r[a + "With"](this === n ? r : this, [e])
                    } : r[a])
                })
            }).promise()
        }, promise: function (e) {
            return null != e ? t.extend(e, i) : i
        }};
        i.pipe = i.then, t.forEach(o, function (e, t) {
            var a = e[2], s = e[3];
            i[e[1]] = a.add, s && a.add(function () {
                r = s
            }, o[1 ^ t][2].disable, o[2][2].lock), n[e[0]] = a.fire, n[e[0] + "With"] = a.fireWith
        }), i.promise(n), e && e.call(n, n)
    }), t.when = t.when || function (e) {
        function n(e, t, n) {
            return function (o) {
                t[e] = this, n[e] = arguments.length > 1 ? arguments : o, n === r ? c.notifyWith(t, n) : --u || c.resolveWith(t, n)
            }
        }

        var r, o, i, a = arguments, s = arguments.length, u = 1 !== s || e && "function" === t.type(e.promise) ? s : 0, c = 1 === u ? e : t.Deferred();
        if (s > 1) {
            r = Array(s), o = Array(s), i = Array(s);
            for (var l = 0; s > l; l++)a[l] && "function" === t.type(a[l].promise) ? a[l].promise().done(n(l, i, a)).fail(c.reject).progress(n(l, o, r)) : --u
        }
        return!u && c.resolveWith(i, a), c.promise()
    }, t.global = t.global || function () {
        var e = t._global_ = window[t.guid], n = e._ = e._ || {};
        return function (e, t, r) {
            return t !== void 0 ? (r || (t = n[e] === void 0 ? t : n[e]), n[e] = t) : e && n[e] === void 0 && (n[e] = {}), n[e]
        }
    }(), t.browser = t.browser || function () {
        var e = navigator.userAgent, n = {isStrict: "CSS1Compat" == document.compatMode, isGecko: /gecko/i.test(e) && !/like gecko/i.test(e), isWebkit: /webkit/i.test(e)};
        try {
            /(\d+\.\d+)/.test(external.max_version) && (n.maxthon = +RegExp.$1)
        } catch (r) {
        }
        switch (!0) {
            case/msie (\d+\.\d+)/i.test(e):
                n.ie = document.documentMode || +RegExp.$1;
                break;
            case/chrome\/(\d+\.\d+)/i.test(e):
                n.chrome = +RegExp.$1;
                break;
            case/(\d+\.\d)?(?:\.\d)?\s+safari\/?(\d+\.\d+)?/i.test(e) && !/chrome/i.test(e):
                n.safari = +(RegExp.$1 || RegExp.$2);
                break;
            case/firefox\/(\d+\.\d+)/i.test(e):
                n.firefox = +RegExp.$1;
                break;
            case/opera(?:\/| )(\d+(?:\.\d+)?)(.+?(version\/(\d+(?:\.\d+)?)))?/i.test(e):
                n.opera = +(RegExp.$4 || RegExp.$1)
        }
        return t.extend(t, n), n
    }(), t.id = function () {
        var e = t.global("_maps_id"), n = t.key;
        return window[t.guid]._counter = window[t.guid]._counter || 1, function (r, o) {
            var i, a = t.isString(r), s = t.isObject(r), u = s ? r[n] : a ? r : "";
            if (t.isString(o))switch (o) {
                case"get":
                    return s ? u : e[u];
                case"remove":
                case"delete":
                    return(i = e[u]) && (t.isElement(i) && 8 > t.browser.ie ? i.removeAttribute(n) : delete i[n], delete e[u]), u;
                default:
                    return a ? ((i = e[u]) && delete e[u], i && (e[i[n] = o] = i)) : s && (u && delete e[u], e[r[n] = o] = r), o
            }
            return s ? (!u && (e[r[n] = u = t.id()] = r), u) : a ? e[r] : "TANGRAM_" + t._global_._counter++
        }
    }(), t._util_ = t._util_ || {}, t._util_.support = t._util_.support || function () {
        var e, t, n, r, o, i = document.createElement("div");
        return i.setAttribute("className", "t"), i.innerHTML = ' <link/><table></table><a href="/a">a</a><input type="checkbox"/>', t = i.getElementsByTagName("A")[0], t.style.cssText = "top:1px;float:left;opacity:.5", r = document.createElement("select"), o = r.appendChild(document.createElement("option")), n = i.getElementsByTagName("input")[0], n.checked = !0, e = {dom: {div: i, a: t, select: r, opt: o, input: n}}
    }(), t.createChain("event", function () {
        var e = {};
        return function (n) {
            switch (t.type(n)) {
                case"object":
                    return e.originalEvent === n ? e : e = new t.event.$Event(n);
                case"$Event":
                    return n
            }
        }
    }(),function (e) {
        var n, r, o = this;
        if (this._type_ = "$Event", "object" == typeof e && e.type) {
            o.originalEvent = n = e;
            for (var i in n)"function" != typeof n[i] && (o[i] = n[i]);
            n.extraData && t.extend(o, n.extraData), o.target = o.srcElement = n.srcElement || (r = n.target) && (3 == r.nodeType ? r.parentNode : r), o.relatedTarget = n.relatedTarget || (r = n.fromElement) && (r === o.target ? n.toElement : r), o.keyCode = o.which = n.keyCode || n.which, o.which || void 0 === n.button || (o.which = 1 & n.button ? 1 : 2 & n.button ? 3 : 4 & n.button ? 2 : 0);
            var a = document.documentElement, s = document.body;
            o.pageX = n.pageX || n.clientX + (a && a.scrollLeft || s && s.scrollLeft || 0) - (a && a.clientLeft || s && s.clientLeft || 0), o.pageY = n.pageY || n.clientY + (a && a.scrollTop || s && s.scrollTop || 0) - (a && a.clientTop || s && s.clientTop || 0), o.data
        }
        this.timeStamp = (new Date).getTime()
    }).extend({stopPropagation: function () {
        var e = this.originalEvent;
        e && (e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0)
    }, preventDefault: function () {
        var e = this.originalEvent;
        e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
    }}), t.merge = function (e, t) {
        var n = e.length, r = 0;
        if ("number" == typeof t.length)for (var o = t.length; o > r; r++)e[n++] = t[r]; else for (; void 0 !== t[r];)e[n++] = t[r++];
        return e.length = n, e
    }, t.array.extend({unique: function (e) {
        var t, n, r = this.length, o = this.slice(0);
        for ("function" != typeof e && (e = function (e, t) {
            return e === t
        }); --r > 0;)for (n = o[r], t = r; t--;)if (e(n, o[t])) {
            o.splice(r, 1);
            break
        }
        for (r = this.length = o.length, t = 0; r > t; t++)this[t] = o[t];
        return this
    }}), t.query = t.query || function () {
        function e(e, n) {
            var o, u, c, l, f, d, p, h = [];
            return r.test(e) ? (c = RegExp.$2, l = RegExp.$1 || "*", t.forEach(n.getElementsByTagName(l), function (e) {
                e.id == c && h.push(e)
            })) : i.test(e) || "*" == e ? t.merge(h, n.getElementsByTagName(e)) : a.test(e) ? (d = [], l = RegExp.$1, f = RegExp.$2, o = " " + f + " ", n.getElementsByClassName ? d = n.getElementsByClassName(f) : t.forEach(n.getElementsByTagName("*"), function (e) {
                e.className && ~(" " + e.className + " ").indexOf(o) && d.push(e)
            }), l && (l = l.toUpperCase()) ? t.forEach(d, function (e) {
                e.tagName.toUpperCase() === l && h.push(e)
            }) : t.merge(h, d)) : s.test(e) && (p = e.substr(1).split("."), t.forEach(n.getElementsByTagName("*"), function (e) {
                e.className && (o = " " + e.className + " ", u = !0, t.forEach(p, function (e) {
                    ~o.indexOf(" " + e + " ") || (u = !1)
                }), u && h.push(e))
            })), h
        }

        function n(r, i) {
            var a, s = r, u = "__tangram__", c = [];
            return!i && o.test(s) && (a = document.getElementById(s.substr(1))) ? [a] : (i = i || document, i.querySelectorAll ? (1 != i.nodeType || i.id ? a = i.querySelectorAll(s) : (i.id = u, a = i.querySelectorAll("#" + u + " " + s), i.id = ""), a) : ~s.indexOf(" ") ? (t.forEach(e(s.substr(0, s.indexOf(" ")), i), function (e) {
                t.merge(c, n(s.substr(s.indexOf(" ") + 1), e))
            }), c) : e(s, i))
        }

        var r = /^(\w*)#([\w\-\$]+)$/, o = /^#([\w\-\$]+)$/, i = /^\w+$/, a = /^(\w*)\.([\w\-\$]+)$/, s = /^(\.[\w\-\$]+)+$/, u = /\s*,\s*/, c = /\s+/g;
        return Array.prototype.slice, function (e, r, o) {
            if (!e || "string" != typeof e)return o || [];
            var i = [];
            return e = e.replace(c, " "), o && t.merge(i, o) && (o.length = 0), t.forEach(e.indexOf(",") > 0 ? e.split(u) : [e], function (e) {
                t.merge(i, n(e, r))
            }), t.merge(o || [], t.array(i).unique())
        }
    }(), t.createChain("dom",function (e, n) {
        var r = new t.dom.$DOM(n);
        if (!e)return r;
        if ("$DOM" == e._type_)return e;
        if (e.nodeType || e == e.window)return r[0] = e, r.length = 1, r;
        if (e.length && "[object String]" != r.toString.call(e))return t.merge(r, e);
        if ("string" == typeof e)if ("<" == e.charAt(0) && ">" == e.charAt(e.length - 1) && e.length > 2) {
            var o = /^<(\w+)\s*\/?>(?:<\/\1>|)$/, i = n && "$DOM" === n._type_ ? n[0] : n, a = o.exec(e);
            i = i && i.nodeType ? i.ownerDocument || i : document, a = a ? [i.createElement(a[1])] : t.dom.createElements ? t.dom.createElements(e) : [], t.merge(r, a)
        } else t.query(e, n, r); else if ("function" == typeof e)return r.ready ? r.ready(e) : r;
        return r
    },function (e) {
        this.length = 0, this._type_ = "$DOM", this.context = e || document
    }).extend({size: function () {
        return this.length
    }, splice: function () {
    }, get: function (e) {
        return"number" == typeof e ? 0 > e ? this[this.length + e] : this[e] : Array.prototype.slice.call(this, 0)
    }, toArray: function () {
        return this.get()
    }}), t.dom.extend({each: function (e) {
        t.check("function", "baidu.dom.each");
        var n, r, o = this.length;
        for (n = 0; o > n && (r = e.call(this[n], n, this[n], this), r !== !1 && "break" != r); n++);
        return this
    }}), t._util_.eventBase = t._util_.eventBase || {}, void function (e, t) {
        e.listener || (t = e.listener = {}, window.addEventListener ? t.add = function (e, t, n) {
            e.addEventListener(t, n, !1)
        } : window.attachEvent && (t.add = function (e, t, n) {
            e.attachEvent("on" + t, n)
        }))
    }(t._util_.eventBase), void function (e) {
        if (!e.queue) {
            var n = t.id, r = e.queue = {}, o = r.attaCache = t.global("eventQueueCache"), i = e.listener;
            r.get = function (e, t, r, i) {
                var a, s = n(e);
                return o[s] || (o[s] = {}), a = o[s], t ? (!a[t] && r && this.setupCall(e, t, r, a[t] = [], i), a[t] || []) : a
            }, r.add = function (e, t, n, r, o) {
                this.get(e, t, n, o).push(r)
            }, r.remove = function (e, t, n) {
                var r, o;
                if (t) {
                    var r = this.get(e, t);
                    if (n)for (var i = r.length - 1; i >= 0; i--)r[i].orig == n && r.splice(i, 1); else r.length = 0
                } else {
                    var o = this.get(e);
                    for (var i in o)o[i].length = 0
                }
            }, r.call = function (e, n, r, o) {
                if (r) {
                    if (!r.length)return;
                    var i = [].slice.call(arguments, 1), a = [];
                    i.unshift(o = t.event(o || n)), o.type = n, o.currentTarget || (o.currentTarget = e), o.target || (o.target = e);
                    for (var s, u = 0, c = r.length; c > u; u++)(s = r[u]) && (s.pkg.apply(e, i), s.one && a.unshift(u));
                    if (a.length)for (var u = 0, c = a.length; c > u; u++)this.remove(e, n, r[u].fn)
                } else r = this.get(e, n), this.call(e, n, r, o)
            }, r.setupCall = function () {
                var e = function (e, t, n, o) {
                    i.add(e, n, function (n) {
                        r.call(e, t, o, n)
                    })
                };
                return function (n, r, o, i, a) {
                    if (a) {
                        n = t.dom(a, n);
                        for (var s = 0, u = n.length; u > s; s++)e(n[s], r, o, i)
                    } else e(n, r, o, i)
                }
            }()
        }
    }(t._util_.eventBase, t.event), void function (e, n) {
        if (!e.core) {
            var r = e.queue, o = e.core = {}, i = n.special = {}, a = [].push, s = function (e, t) {
                for (var n = 0, r = t.length; r > n; n++)if (t.get(n).contains(e))return t[n]
            };
            o.build = function (e, n, r, o, u) {
                var c;
                return o && (c = t.dom(o, e)), n in i && i[n].pack && (r = i[n].pack(r)), function (n) {
                    var i, l = (t.dom(n.target), [n]);
                    if (u && !n.data && (n.data = u), n.triggerData && a.apply(l, n.triggerData), !c)return n.result = r.apply(e, l);
                    for (var f = 0; 2 > f; f++) {
                        if (i = s(n.target, c))return n.result = r.apply(i, l);
                        c = t.dom(o, e)
                    }
                }
            }, o.add = function (e, t, n, o, a, s) {
                var u, c, l = this.build(e, t, n, o, a);
                c = t, t in i && (u = i[t].attachElements, c = i[t].bindType || t), r.add(e, t, c, {type: t, pkg: l, orig: n, one: s}, u)
            }, o.remove = function (e, t, n, o) {
                r.remove(e, t, n, o)
            }
        }
    }(t._util_.eventBase, t.event), t.dom.extend({on: function (e, n, r, o, i) {
        var a = t._util_.eventBase.core;
        return"object" == typeof n && n ? (o = r, r = n, n = null) : "function" == typeof r ? (o = r, r = null) : "function" == typeof n && (o = n, n = r = null), "string" == typeof e ? (e = e.split(/[ ,]+/), this.each(function () {
            t.forEach(e, function (e) {
                a.add(this, e, o, n, r, i)
            }, this)
        })) : "object" == typeof e && (o && (o = null), t.forEach(e, function (e, t) {
            this.on(t, n, r, e, i)
        }, this)), this
    }}), t.dom.g = function (e) {
        return e ? "string" == typeof e || e instanceof String ? document.getElementById(e) : !e.nodeName || 1 != e.nodeType && 9 != e.nodeType ? null : e : null
    }, t.event.on = t.on = function (e, n, r) {
        return"string" == typeof e && (e = t.dom.g(e)), t.dom(e).on(n.replace(/^\s*on/, ""), r), e
    }, void function () {
        function e(e) {
            var n, r;
            if (!e || "string" !== t.type(e))return null;
            try {
                window.DOMParser ? (r = new DOMParser, n = r.parseFromString(e, "text/xml")) : (n = new ActiveXObject("Microsoft.XMLDOM"), n.async = "false", n.loadXML(e))
            } catch (o) {
                n = void 0
            }
            if (!n || !n.documentElement || n.getElementsByTagName("parsererror").length)throw Error("Invalid XML: " + e);
            return n
        }

        function n(e) {
            if (!e || "string" !== t.type(e))return null;
            if (e = t.string(e).trim(), window.JSON && window.JSON.parse)return window.JSON.parse(e);
            if (_.test(e.replace(T, "@").replace(C, "]").replace(E, "")))return Function("return " + e)();
            throw Error("Invalid JSON: " + e)
        }

        function r(e) {
            e && /\S/.test(e) && (window.execScript || function (e) {
                window.eval.call(window, e)
            })(e)
        }

        function o(e) {
            return function (n, r) {
                "string" !== t.type(n) && (r = n, n = "*");
                var o, i, a = n.toLowerCase().split(/\s+/);
                if ("function" === t.type(r))for (var s, u = 0; s = a[u]; u++)o = /^\+/.test(s), o && (s = s.substr(1) || "*"), i = e[s] = e[s] || [], i[o ? "unshift" : "push"](r)
            }
        }

        function i(e, t, n) {
            var r, o, i, a, s = e.contents, u = e.dataTypes, c = e.responseFields;
            for (o in c)o in n && (t[c[o]] = n[o]);
            for (; "*" === u[0];)u.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("content-type"));
            if (r)for (o in s)if (s[o] && s[o].test(r)) {
                u.unshift(o);
                break
            }
            if (u[0]in n)i = u[0]; else {
                for (o in n) {
                    if (!u[0] || e.converters[o + " " + u[0]]) {
                        i = o;
                        break
                    }
                    a || (a = o)
                }
                i = i || a
            }
            return i ? (i !== u[0] && u.unshift(i), n[i]) : void 0
        }

        function a(e, t) {
            var n, r, o = e.dataTypes.slice(), i = o[0], a = {};
            if (e.dataFilter && (t = e.dataFilter(t, e.dataType)), o[1])for (var s in e.converters)a[s.toLowerCase()] = e.converters[s];
            for (var u, s = 0; u = o[++s];)if ("*" !== u) {
                if ("*" !== i && i !== u) {
                    if (n = a[i + " " + u] || a["* " + u], !n)for (var c in a)if (r = c.split(" "), r[1] === u && (n = a[i + " " + r[0]] || a["* " + r[0]])) {
                        n === !0 ? n = a[c] : a[c] !== !0 && (u = r[0], o.splice(s--, 0, u));
                        break
                    }
                    if (n !== !0)if (n && e["throws"])t = n(t); else try {
                        t = n(t)
                    } catch (l) {
                        return{state: "parsererror", error: n ? l : "No conversion from " + i + " to " + u}
                    }
                }
                i = u
            }
            return{state: "success", data: t}
        }

        function s(e, t, n, r, o, i) {
            o = o || t.dataTypes[0], i = i || {}, i[o] = !0;
            for (var a, u = e[o], c = u ? u.length : 0, l = e === N, f = 0; c > f && (l || !a); f++)a = u[f](t, n, r), "string" == typeof a && (!l || i[a] ? a = void 0 : (t.dataTypes.unshift(a), a = s(e, t, n, r, a, i)));
            return!l && a || i["*"] || (a = s(e, t, n, r, "*", i)), a
        }

        function u(e, n) {
            var r, o = t.ajax.settings.flatOptions || {};
            for (var i in n)void 0 !== n[i] && ((o[i] ? e : r || (r = {}))[i] = n[i]);
            r && t.extend(!0, e, r)
        }

        function c(e, n, r) {
            r = "function" === t.type(r) ? r() : r === void 0 || null == r ? "" : r, e.push(encodeURIComponent(n) + "=" + encodeURIComponent(r))
        }

        function l(e, n, r, o) {
            if ("array" === t.type(r))t.forEach(r, function (t, r) {
                o || v.test(n) ? c(e, n, t) : l(e, n + "[" + ("object" == typeof t ? r : "") + "]", t, o)
            }); else if (o || "object" !== t.type(r))c(e, n, r); else for (var i in r)l(e, n + "[" + i + "]", r[i], o)
        }

        function f() {
            try {
                return new window.XMLHttpRequest
            } catch (e) {
            }
        }

        function d() {
            try {
                return new window.ActiveXObject("Microsoft.XMLHTTP")
            } catch (e) {
            }
        }

        var p = document.URL, h = /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/, m = /^\/\//, g = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/, y = /#.*$/, v = /\[\]$/, b = /^(?:GET|HEAD)$/, x = /([?&])_=[^&]*/, w = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm, _ = /^[\],:{}\s]*$/, E = /(?:^|:|,)(?:\s*\[)+/g, T = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g, C = /"[^"\\\r\n]*"|true|false|null|-?(?:\d\d*\.|)\d+(?:[eE][\-+]?\d+|)/g, S = ["*/"] + ["*"], N = {}, A = {}, O = {}, k = {}, L = g.exec(p.toLowerCase()) || [];
        t.createChain("ajax", function (e, n) {
            function r(e, t, n, r) {
                var o, s, c, f, m, g = t;
                2 !== C && (C = 2, p && clearTimeout(p), d = void 0, l = r || "", $.readyState = e > 0 ? 4 : 0, n && (f = i(h, $, n)), e >= 200 && 300 > e || 304 === e ? (h.ifModified && (m = $.getResponseHeader("Last-Modified"), m && (O[u] = m), m = $.getResponseHeader("Etag"), m && (k[u] = m)), 304 === e ? (g = "notmodified", o = !0) : (o = a(h, f), g = o.state, s = o.data, c = o.error, o = !c)) : (c = g, (!g || e) && (g = "error", 0 > e && (e = 0))), $.status = e, $.statusText = "" + (t || g), o ? _.resolveWith(v, [s, g, $]) : _.rejectWith(v, [$, g, c]), $.statusCode(T), T = void 0, E.fireWith(v, [$, g]))
            }

            t.object.isPlain(e) && (n = e, e = void 0), n = n || {};
            var o, u, c, l, f, d, p, h = t.ajax.setup({}, n), v = h.context || h, _ = t.Deferred(), E = t.Callbacks("once memory"), T = h.statusCode || {}, C = 0, j = {}, M = {}, D = "canceled", $ = t.extend(new t.ajax.$Ajax(e, h), {readyState: 0, setRequestHeader: function (e, t) {
                if (!C) {
                    var n = e.toLowerCase();
                    e = j[n] = j[n] || e, M[e] = t
                }
            }, getAllResponseHeaders: function () {
                return 2 === C ? l : null
            }, getResponseHeader: function (e) {
                var t;
                if (2 === C) {
                    if (!f)for (f = {}; t = w.exec(l);)f[t[1].toLowerCase()] = t[2];
                    t = f[e.toLowerCase()]
                }
                return void 0 === t ? null : t
            }, overrideMimeType: function (e) {
                return!C && (h.mimeType = e), this
            }, abort: function (e) {
                return e = e || D, d && d.abort(e), r(0, e), this
            }});
            if (_.promise($), $.success = $.done, $.error = $.fail, $.complete = E.add, $.statusCode = function (e) {
                if (e)if (2 > C)for (var t in e)T[t] = [T[t], e[t]]; else $.always(e[$.status]);
                return this
            }, h.url = ((e || h.url) + "").replace(y, "").replace(m, L[1] + "//"), h.dataTypes = t.string(h.dataType || "*").trim().toLowerCase().split(/\s+/), null == h.crossDomain && (c = g.exec(h.url.toLowerCase()), h.crossDomain = !(!c || c[1] == L[1] && c[2] == L[2] && (c[3] || ("http:" === c[1] ? 80 : 443)) == (L[3] || ("http:" === L[1] ? 80 : 443)))), h.data && h.processData && "string" !== t.type(h.data) && (h.data = t.ajax.param(h.data, h.traditional)), s(N, h, n, $), 2 === C)return"";
            if (o = h.global, h.type = h.type.toUpperCase(), h.hasContent = !b.test(h.type), !h.hasContent && (h.data && (h.url += (~h.url.indexOf("?") ? "&" : "?") + h.data, delete h.data), u = h.url, h.cache === !1)) {
                var H = (new Date).getTime(), F = h.url.replace(x, "$1_=" + H);
                h.url = F + (F === h.url ? (~h.url.indexOf("?") ? "&" : "?") + "_=" + H : "")
            }
            (h.data && h.hasContent && h.contentType !== !1 || n.contentType) && $.setRequestHeader("Content-Type", h.contentType), h.ifModified && (u = u || h.url, O[u] && $.setRequestHeader("If-Modified-Since", O[u]), k[u] && $.setRequestHeader("If-None-Match", k[u])), $.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + S + "; q=0.01" : "") : h.accepts["*"]);
            for (var B in h.headers)$.setRequestHeader(B, h.headers[B]);
            if (h.beforeSend && (h.beforeSend.call(v, $, h) === !1 || 2 === C))return $.abort();
            D = "abort";
            for (var B in{success: 1, error: 1, complete: 1})$[B](h[B]);
            if (d = s(A, h, n, $)) {
                $.readyState = 1, h.async && h.timeout > 0 && (p = setTimeout(function () {
                    $.abort("timeout")
                }, h.timeout));
                try {
                    C = 1, d.send(M, r)
                } catch (I) {
                    if (!(2 > C))throw I;
                    r(-1, I)
                }
            } else r(-1, "No Transport");
            return $
        }, function (e, t) {
            this.url = e, this.options = t
        }), t.ajax.settings = {url: p, isLocal: h.test(L[1]), global: !0, type: "GET", contentType: "application/x-www-form-urlencoded; charset=UTF-8", processData: !0, async: !0, accepts: {xml: "application/xml, text/xml", html: "text/html", text: "text/plain", json: "application/json, text/javascript", "*": S}, contents: {xml: /xml/, html: /html/, json: /json/}, responseFields: {xml: "responseXML", text: "responseText"}, converters: {"* text": window.String, "text html": !0, "text json": n, "text xml": e}, flatOptions: {context: !0, url: !0}}, t.ajax.setup = function (e, n) {
            return n ? u(e, t.ajax.settings) : (n = e, e = t.ajax.settings), u(e, n), e
        }, t.ajax.param = function (e, n) {
            var r = [];
            if ("array" === t.type(e))t.forEach(e, function (e) {
                c(r, e.name, e.value)
            }); else for (var o in e)l(r, o, e[o], n);
            return r.join("&").replace(/%20/g, "+")
        }, t.ajax.prefilter = o(N), t.ajax.transport = o(A);
        var j = [], M = /(=)\?(?=&|$)|\?\?/, D = (new Date).getTime();
        t.ajax.setup({jsonp: "callback", jsonpCallback: function () {
            var e = j.pop() || t.key + "_" + D++;
            return this[e] = !0, e
        }}), t.ajax.prefilter("json jsonp", function (e, n, r) {
            var o, i, a, s = e.data, u = e.url, c = e.jsonp !== !1, l = c && M.test(u), f = c && !l && "string" === t.type(s) && !(e.contentType || "").indexOf("application/x-www-form-urlencoded") && M.test(s);
            return"jsonp" === e.dataTypes[0] || l || f ? (o = e.jsonpCallback = "function" === t.type(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, i = window[o], l ? e.url = u.replace(M, "$1" + o) : f ? e.data = s.replace(M, "$1" + o) : c && (e.url += (/\?/.test(u) ? "&" : "?") + e.jsonp + "=" + o), e.converters["script json"] = function () {
                return a[0]
            }, e.dataTypes[0] = "json", window[o] = function () {
                a = arguments
            }, r.always(function () {
                window[o] = i, e[o] && (e.jsonpCallback = n.jsonpCallback, j.push(o)), a && "function" === t.type(i) && i(a[0]), a = i = void 0
            }), "script") : void 0
        }), t.ajax.setup({accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"}, contents: {script: /javascript|ecmascript/}, converters: {"text script": function (e) {
            return r(e), e
        }}}), t.ajax.prefilter("script", function (e) {
            void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
        }), t.ajax.transport("script", function (e) {
            if (e.crossDomain) {
                var t, n = document.head || document.getElementsByTagName("head")[0] || document.documentElement;
                return{send: function (r, o) {
                    t = document.createElement("script"), t.async = "async", e.scriptCharset && (t.charset = e.scriptCharset), t.src = e.url, t.onload = t.onreadystatechange = function (e, r) {
                        (r || !t.readyState || /loaded|complete/.test(t.readyState)) && (t.onload = t.onreadystatechange = null, n && t.parentNode && n.removeChild(t), t = void 0, !r && o(200, "success"))
                    }, n.insertBefore(t, n.firstChild)
                }, abort: function () {
                    t && t.onload(0, 1)
                }}
            }
        });
        var $, H = 0, F = window.ActiveXObject ? function () {
            for (var e in $)$[e](0, 1)
        } : !1;
        t.ajax.settings.xhr = window.ActiveXObject ? function () {
            return!this.isLocal && f() || d()
        } : f, void function (e) {
            t.extend(t._util_.support, {ajax: !!e, cors: !!e && "withCredentials"in e})
        }(t.ajax.settings.xhr()), t._util_.support.ajax && t.ajax.transport(function (e) {
            if (!e.crossDomain || t._util_.support.cors) {
                var n;
                return{send: function (r, o) {
                    var i, a = e.xhr();
                    if (e.username ? a.open(e.type, e.url, e.async, e.username, e.password) : a.open(e.type, e.url, e.async), e.xhrFields)for (var s in e.xhrFields)a[s] = e.xhrFields[s];
                    e.mimeType && a.overrideMimeType && a.overrideMimeType(e.mimeType), e.crossDomain || r["X-Requested-With"] || (r["X-Requested-With"] = "XMLHttpRequest");
                    try {
                        for (var s in r)a.setRequestHeader(s, r[s])
                    } catch (u) {
                    }
                    a.send(e.hasContent && e.data || null), n = function (t, r) {
                        var s, u, c, l, f;
                        try {
                            if (n && (r || 4 === a.readyState))if (n = void 0, i && (a.onreadystatechange = function () {
                            }, F && delete $[i]), r)4 !== a.readyState && a.abort(); else {
                                s = a.status, c = a.getAllResponseHeaders(), l = {}, f = a.responseXML, f && f.documentElement && (l.xml = f);
                                try {
                                    l.text = a.responseText
                                } catch (d) {
                                }
                                try {
                                    u = a.statusText
                                } catch (d) {
                                    u = ""
                                }
                                s || !e.isLocal || e.crossDomain ? 1223 === s && (s = 204) : s = l.text ? 200 : 404
                            }
                        } catch (p) {
                            !r && o(-1, p)
                        }
                        l && o(s, u, l, c)
                    }, e.async ? 4 === a.readyState ? setTimeout(n, 0) : (i = ++H, F && ($ || ($ = {}, t.dom(window).on("unload", F)), $[i] = n), a.onreadystatechange = n) : n()
                }, abort: function () {
                    n && n(0, 1)
                }}
            }
        })
    }(), t.array.extend({contains: function (e) {
        return!!~this.indexOf(e)
    }}), t.each = function (e, t, n) {
        var r, o, i, a;
        if ("function" == typeof t && e)if (o = "number" == typeof e.length ? e.length : e.byteLength, "number" == typeof o) {
            if ("[object Function]" === Object.prototype.toString.call(e))return e;
            for (r = 0; o > r && (i = e[r] || e.charAt && e.charAt(r), a = t.call(n || i, r, i, e), a !== !1 && "break" != a); r++);
        } else if ("number" == typeof e)for (r = 0; e > r && (a = t.call(n || r, r, r, r), a !== !1 && "break" != a); r++); else if ("object" == typeof e)for (r in e)if (e.hasOwnProperty(r) && (a = t.call(n || e[r], r, e[r], e), a === !1 || "break" == a))break;
        return e
    }, t.array.extend({each: function (e, n) {
        return t.each(this, e, n)
    }, forEach: function (e, n) {
        return t.forEach(this, e, n)
    }}), t.array.extend({empty: function () {
        return this.length = 0, this
    }}), t.array.extend({filter: function (e, n) {
        var r, o, i, a = t.array([]), s = 0;
        if ("function" === t.type(e))for (r = 0, o = this.length; o > r; r++)i = this[r], e.call(n || this, i, r, this) === !0 && (a[s++] = i);
        return a
    }}), t.array.extend({find: function (e) {
        var n, r, o = this.length;
        if ("function" == t.type(e))for (n = 0; o > n; n++)if (r = this[n], e.call(this, r, n, this) === !0)return r;
        return null
    }}), t.array.extend({hash: function (e) {
        var t, n, r = {}, o = e && e.length;
        for (t = 0, n = this.length; n > t; t++)r[this[t]] = o && o > t ? e[t] : !0;
        return r
    }}), t.array.extend({lastIndexOf: function (e, n) {
        t.check(".+(,number)?", "baidu.array.lastIndexOf");
        var r = this.length;
        for ((!(n = 0 | n) || n >= r) && (n = r - 1), 0 > n && (n += r); n >= 0; n--)if (n in this && this[n] === e)return n;
        return-1
    }}), t.array.extend({map: function (e, n) {
        t.check("function(,.+)?", "baidu.array.map");
        for (var r = this.length, o = t.array([]), i = 0; r > i; i++)o[i] = e.call(n || this, this[i], i, this);
        return o
    }}), t.array.extend({remove: function (e) {
        for (var t = this.length; t--;)this[t] === e && this.splice(t, 1);
        return this
    }}), t.array.extend({removeAt: function (e) {
        return t.check("number", "baidu.array.removeAt"), this.splice(e, 1)[0]
    }}), t.base = t.base || {blank: function () {
    }}, t.base.Class = function () {
        var e = (t._global_ = window[t.guid])._instances;
        return e || (e = t._global_._instances = {}), function () {
            this.guid = t.id(), this._decontrol_ || (e[this.guid] = this)
        }
    }(), t.extend(t.base.Class.prototype, {toString: t.base.Class.prototype.toString = function () {
        return"[object " + (this._type_ || "Object") + "]"
    }, dispose: function () {
        if (delete t._global_._instances[this.guid], this._listeners_)for (var e in this._listeners_)this._listeners_[e].length = 0, delete this._listeners_[e];
        for (var n in this)t.isFunction(this[n]) ? this[n] = t.base.blank : delete this[n];
        this.disposed = !0
    }, fire: function (e, n) {
        t.isString(e) && (e = new t.base.Event(e));
        var r, o, i, a = this._listeners_, s = e.type, u = [e].concat(Array.prototype.slice.call(arguments, 1));
        if (!a && (a = this._listeners_ = {}), t.extend(e, n || {}), e.target = e.target || this, e.currentTarget = this, s.indexOf("on") && (s = "on" + s), t.isFunction(this[s]) && this[s].apply(this, u), (r = this._options) && t.isFunction(r[s]) && r[s].apply(this, u), t.isArray(o = a[s]))for (r = o.length - 1; r > -1; r--)i = o[r], i && i.handler.apply(this, u), i && i.once && o.splice(r, 1);
        return e.returnValue
    }, on: function (e, n, r) {
        if (!t.isFunction(n))return this;
        var o, i = this._listeners_;
        return!i && (i = this._listeners_ = {}), e.indexOf("on") && (e = "on" + e), !t.isArray(o = i[e]) && (o = i[e] = []), i[e].unshift({handler: n, once: !!r}), this
    }, once: function (e, t) {
        return this.on(e, t, !0)
    }, one: function (e, t) {
        return this.on(e, t, !0)
    }, off: function (e, t) {
        var n, r, o = this._listeners_;
        if (!o)return this;
        if (e === void 0) {
            for (n in o)delete o[n];
            return this
        }
        if (e.indexOf("on") && (e = "on" + e), t === void 0)delete o[e]; else if (r = o[e])for (n = r.length - 1; n >= 0; n--)r[n].handler === t && r.splice(n, 1);
        return this
    }}), t.base.Class.prototype.addEventListener = t.base.Class.prototype.on, t.base.Class.prototype.removeEventListener = t.base.Class.prototype.un = t.base.Class.prototype.off, t.base.Class.prototype.dispatchEvent = t.base.Class.prototype.fire, window.baiduInstance = function (e) {
        return window[t.guid]._instances[e]
    }, t.base.Event = function (e, t) {
        this.type = e, this.returnValue = !0, this.target = t || null, this.currentTarget = null, this.preventDefault = function () {
            this.returnValue = !1
        }
    }, t.base.inherits = function (e, t, n) {
        var r, o, i = e.prototype, a = Function();
        a.prototype = t.prototype, o = e.prototype = new a;
        for (r in i)o[r] = i[r];
        return e.prototype.constructor = e, e.superClass = t.prototype, "string" == typeof n && (o._type_ = n), e.extend = function (t) {
            for (var n in t)o[n] = t[n];
            return e
        }, e
    }, t.base.register = function (e, t, n) {
        (e._reg_ || (e._reg_ = [])).push(t);
        for (var r in n)e.prototype[r] = n[r]
    }, t.cookie = t.cookie || {}, t.cookie._isValidKey = function (e) {
        return RegExp('^[^\\x00-\\x20\\x7f\\(\\)<>@,;:\\\\\\"\\[\\]\\?=\\{\\}\\/\\u0080-\\uffff]+$').test(e)
    }, t.cookie.getRaw = function (e) {
        if (t.cookie._isValidKey(e)) {
            var n = RegExp("(^| )" + e + "=([^;]*)(;|$)"), r = n.exec(document.cookie);
            if (r)return r[2] || null
        }
        return null
    }, t.cookie.get = function (e) {
        var n = t.cookie.getRaw(e);
        return"string" == typeof n ? n = decodeURIComponent(n) : null
    }, t.cookie.setRaw = function (e, n, r) {
        if (t.cookie._isValidKey(e)) {
            r = r || {};
            var o = r.expires;
            "number" == typeof r.expires && (o = new Date, o.setTime(o.getTime() + r.expires)), document.cookie = e + "=" + n + (r.path ? "; path=" + r.path : "") + (o ? "; expires=" + o.toGMTString() : "") + (r.domain ? "; domain=" + r.domain : "") + (r.secure ? "; secure" : "")
        }
    }, t.cookie.remove = function (e, n) {
        n = n || {}, n.expires = new Date(0), t.cookie.setRaw(e, "", n)
    }, t.cookie.set = function (e, n, r) {
        t.cookie.setRaw(e, encodeURIComponent(n), r)
    }, t.createClass = function (e, n, r) {
        e = t.isFunction(e) ? e : function () {
        }, r = "object" == typeof n ? n : r || {};
        var o = function () {
            var t = this;
            r.decontrolled && (t._decontrol_ = !0), o.superClass.apply(t, arguments);
            for (var n in o.options)t[n] = o.options[n];
            e.apply(t, arguments);
            for (var n = 0, i = o._reg_; i && i.length > n; n++)i[n].apply(t, arguments)
        };
        return t.extend(o, {superClass: r.superClass || t.base.Class, inherits: function (n) {
            if ("function" != typeof n)return o;
            var r = function () {
            };
            r.prototype = (o.superClass = n).prototype;
            var i = o.prototype = new r;
            return t.extend(o.prototype, e.prototype), i.constructor = e, o
        }, register: function (e, n) {
            return(o._reg_ || (o._reg_ = [])).push(e), n && t.extend(o.prototype, n), o
        }, extend: function (e) {
            return t.extend(o.prototype, e), o
        }}), n = t.isString(n) ? n : r.className || r.type, t.isString(n) && (e.prototype._type_ = n), t.isFunction(o.superClass) && o.inherits(o.superClass), o
    }, t.createSingle = function (e, n) {
        var r = new t.base.Class;
        return t.isString(n) && (r._type_ = n), t.extend(r, e)
    }, t.date = t.date || {}, t.createChain("number", function (e) {
        var n = parseFloat(e), r = isNaN(n) ? n : e, o = "number" == typeof r ? Number : String, i = o.prototype;
        return r = new o(r), t.forEach(t.number.$Number.prototype, function (e, t) {
            i[t] || (r[t] = e)
        }), r
    }), t.number.extend({pad: function (e) {
        var t = this, n = "", r = 0 > t, o = Math.abs(t) + "";
        return e > o.length && (n = Array(e - o.length + 1).join("0")), (r ? "-" : "") + n + o
    }}), t.date.format = function (e, n) {
        function r(e, t) {
            n = n.replace(e, t)
        }

        if ("string" != typeof n)return"" + e;
        var o = t.number.pad, i = e.getFullYear(), a = e.getMonth() + 1, s = e.getDate(), u = e.getHours(), c = e.getMinutes(), l = e.getSeconds();
        return r(/yyyy/g, o(i, 4)), r(/yy/g, o(parseInt(("" + i).slice(2), 10), 2)), r(/MM/g, o(a, 2)), r(/M/g, a), r(/dd/g, o(s, 2)), r(/d/g, s), r(/HH/g, o(u, 2)), r(/H/g, u), r(/hh/g, o(u % 12, 2)), r(/h/g, u % 12), r(/mm/g, o(c, 2)), r(/m/g, c), r(/ss/g, o(l, 2)), r(/s/g, l), n
    }, t.date.parse = function (e) {
        var t = RegExp("^\\d+(\\-|\\/)\\d+(\\-|\\/)\\d+$");
        if ("string" == typeof e) {
            if (t.test(e) || isNaN(Date.parse(e))) {
                var n = e.split(/ |T/), r = n.length > 1 ? n[1].split(/[^\d]/) : [0, 0, 0], o = n[0].split(/[^\d]/);
                return new Date(o[0] - 0, o[1] - 1, o[2] - 0, r[0] - 0, r[1] - 0, r[2] - 0)
            }
            return new Date(e)
        }
        return new Date
    }, t.dom.createElements = function () {
        function e(e, t) {
            var n, r, o, i = e.getElementsByTagName("SCRIPT");
            for (n = i.length - 1; n >= 0; n--)o = i[n], r = t.createElement("SCRIPT"), o.id && (r.id = o.id), o.src && (r.src = o.src), o.type && (r.type = o.type), r[o.text ? "text" : "textContent"] = o.text || o.textContent, o.parentNode.replaceChild(r, o)
        }

        var n = /<(\w+)/i, r = /<|&#?\w+;/, o = {area: [1, "<map>", "</map>"], col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"], legend: [1, "<fieldset>", "</fieldset>"], option: [1, "<select multiple='multiple'>", "</select>"], td: [3, "<table><tbody><tr>", "</tr></tbody></table>"], thead: [1, "<table>", "</table>"], tr: [2, "<table><tbody>", "</tbody></table>"], _default: [0, "", ""]};
        return o.optgroup = o.option, o.tbody = o.tfoot = o.colgroup = o.caption = o.thead, o.th = o.td, function (i, a) {
            t.isNumber(i) && (i = "" + i), a = a || document;
            var s, u, c, l = i, f = (l.length, a.createElement("div")), d = a.createDocumentFragment(), p = [];
            if (t.isString(l))if (r.test(l)) {
                for (s = o[l.match(n)[1].toLowerCase()] || o._default, f.innerHTML = "<i>mz</i>" + s[1] + l + s[2], f.removeChild(f.firstChild), e(f, a), u = s[0], c = f; u--;)c = c.firstChild;
                t.merge(p, c.childNodes), t.forEach(p, function (e) {
                    d.appendChild(e)
                }), f = c = null
            } else p.push(a.createTextNode(l));
            return f = null, p
        }
    }(), t.dom.extend({add: function (e, n) {
        var r = t.array(this.get());
        switch (t.type(e)) {
            case"HTMLElement":
                r.push(e);
                break;
            case"$DOM":
            case"array":
                t.merge(r, e);
                break;
            case"string":
                t.merge(r, t.dom(e, n));
                break;
            default:
                "object" == typeof e && e.length && t.merge(r, e)
        }
        return t.dom(r.unique())
    }}), t.dom.extend({addClass: function (e) {
        if (!arguments.length)return this;
        var n = typeof e, r = " ";
        if ("string" == n) {
            e = t.string.trim(e);
            var o = e.split(" ");
            t.forEach(this, function (e) {
                for (var t = e.className, n = 0; o.length > n; n++)~(r + t + r).indexOf(r + o[n] + r) || (t += " " + o[n]);
                e.className = t.replace(/^\s+/g, "")
            })
        } else"function" == n && t.forEach(this, function (n, r) {
            t.dom(n).addClass(e.call(n, r, n.className))
        });
        return this
    }}), t.dom.extend({getDocument: function () {
        if (0 >= this.size())return void 0;
        var e = this[0];
        return 9 == e.nodeType ? e : e.ownerDocument || e.document
    }}), t._util_.cleanData = function (e) {
        for (var n, r, o = 0; r = e[o]; o++)n = t.id(r, "get"), n && (t._util_.eventBase.queue.remove(r), t.id(r, "remove"))
    }, t.dom.extend({empty: function () {
        for (var e, n = 0; e = this[n]; n++)for (1 === e.nodeType && t._util_.cleanData(e.getElementsByTagName("*")); e.firstChild;)e.removeChild(e.firstChild);
        return this
    }}), t.dom.extend({append: function () {
        return t.check("^(?:string|function|HTMLElement|\\$DOM)(?:,(?:string|array|HTMLElement|\\$DOM))*$", "baidu.dom.append"), t._util_.smartInsert(this, arguments, function (e) {
            1 === this.nodeType && this.appendChild(e)
        }), this
    }}), t.dom.extend({html: function (e) {
        var n, r = t.dom, o = t._util_, i = this, a = !1, s = !!o.support.dom.div.getElementsByTagName("link").length, u = 3 === o.support.dom.div.firstChild.nodeType;
        if (!this.size())switch (typeof e) {
            case"undefined":
                return void 0;
            default:
                return i
        }
        var c = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video", l = /<(?:script|style|link)/i, f = RegExp("<(?:" + c + ")[\\s/>]", "i"), d = /^\s+/, p = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi, h = /<([\w:]+)/, m = {option: [1, "<select multiple='multiple'>", "</select>"], legend: [1, "<fieldset>", "</fieldset>"], thead: [1, "<table>", "</table>"], tr: [2, "<table><tbody>", "</tbody></table>"], td: [3, "<table><tbody><tr>", "</tr></tbody></table>"], col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"], area: [1, "<map>", "</map>"], _default: [0, "", ""]};
        return m.optgroup = m.option, m.tbody = m.tfoot = m.colgroup = m.caption = m.thead, m.th = m.td, s || (m._default = [1, "X<div>", "</div>"]), t.forEach(i, function (t, o) {
            if (!n) {
                var c = r(t);
                switch (typeof e) {
                    case"undefined":
                        return n = 1 === t.nodeType ? t.innerHTML : void 0, void 0;
                    case"number":
                        e += "";
                    case"string":
                        if (a = !0, !(l.test(e) || !s && f.test(e) || !u && d.test(e) || m[(h.exec(e) || ["", ""])[1].toLowerCase()])) {
                            e = e.replace(p, "<$1></$2>");
                            try {
                                1 === t.nodeType && (c.empty(), t.innerHTML = e), t = 0
                            } catch (g) {
                            }
                        }
                        t && i.empty().append(e);
                        break;
                    case"function":
                        a = !0, c.html(e.call(t, o, c.html()))
                }
            }
        }), a ? i : n
    }}), t._util_.smartInsert = function (e, n, r) {
        if (!(0 >= n.length || 0 >= e.size())) {
            if ("function" === t.type(n[0])) {
                var o, i = n[0];
                return t.forEach(e, function (e, a) {
                    o = t.dom(e), n[0] = i.call(e, a, o.html()), t._util_.smartInsert(o, n, r)
                })
            }
            for (var a, s, u = e.getDocument() || document, c = u.createDocumentFragment(), l = e.length - 1, f = 0; s = n[f]; f++)s.nodeType ? c.appendChild(s) : t.forEach(~"string|number".indexOf(t.type(s)) ? t.dom.createElements(s, u) : s, function (e) {
                c.appendChild(e)
            });
            (a = c.firstChild) && t.forEach(e, function (e, t) {
                r.call("table" === e.nodeName.toLowerCase() && "tr" === a.nodeName.toLowerCase() ? e.tBodies[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e, l > t ? c.cloneNode(!0) : c)
            })
        }
    }, t.dom.extend({after: function () {
        t.check("^(?:string|function|HTMLElement|\\$DOM)(?:,(?:string|array|HTMLElement|\\$DOM))*$", "baidu.dom.after");
        var e = this[0] && this[0].parentNode, n = !e && [];
        return t._util_.smartInsert(this, arguments, function (r) {
            e ? e.insertBefore(r, this.nextSibling) : t.merge(n, r.childNodes)
        }), n && t.merge(this, n), this
    }}), t.dom.extend({map: function (e) {
        t.check("function", "baidu.dom.map");
        var n = t.dom();
        return t.forEach(this, function (t, r) {
            n[n.length++] = e.call(t, r, t, t)
        }), n
    }}), t._util_.isXML = function (e) {
        var t = (e ? e.ownerDocument || e : 0).documentElement;
        return t ? "HTML" !== t.nodeName : !1
    }, t.dom.extend({clone: function () {
        function e(e) {
            return e.getElementsByTagName ? e.getElementsByTagName("*") : e.querySelectorAll ? e.querySelectorAll("*") : []
        }

        function n(e, n) {
            switch (n.clearAttributes && n.clearAttributes(), n.mergeAttributes && n.mergeAttributes(e), n.nodeName.toLowerCase()) {
                case"object":
                    n.outerHTML = e.outerHTML;
                    break;
                case"textarea":
                case"input":
                    ~"checked|radio".indexOf(e.type) && (e.checked && (n.defaultChecked = n.checked = e.checked), n.value !== e.value && (n.value = e.value)), n.defaultValue = e.defaultValue;
                    break;
                case"option":
                    n.selected = e.defaultSelected;
                    break;
                case"script":
                    n.text !== e.text && (n.text = e.text)
            }
            n[t.key] && n.removeAttribute(t.key)
        }

        function r(e, n) {
            if (1 === n.nodeType && t.id(e, "get")) {
                var r = s.get(e);
                for (var o in r)for (var i, u = 0; i = r[o][u]; u++)a.add(n, o, i.orig, null, null, i.one)
            }
        }

        function o(o, i, a) {
            var s, u, f, d = o.cloneNode(!0);
            if (!(l && c || 1 !== o.nodeType && 11 !== o.nodeType || t._util_.isXML(o))) {
                n(o, d), s = e(o), u = e(d), f = s.length;
                for (var p = 0; f > p; p++)u[p] && n(s[p], u[p])
            }
            if (i && (r(o, d), a)) {
                s = e(o), u = e(d), f = s.length;
                for (var p = 0; f > p; p++)r(s[p], u[p])
            }
            return d
        }

        var i = t._util_, a = i.eventBase.core, s = i.eventBase.queue, u = i.support.dom.div, c = i.support.dom.input.cloneNode(!0).checked, l = !0;
        return!u.addEventListener && u.attachEvent && u.fireEvent && (u.attachEvent("onclick", function () {
            l = !1
        }), u.cloneNode(!0).fireEvent("onclick")), function (e, t) {
            return e = !!e, t = !!t, this.map(function () {
                return o(this, e, t)
            })
        }
    }()}), t._util_.contains = document.compareDocumentPosition ? function (e, t) {
        return!!(16 & e.compareDocumentPosition(t))
    } : function (e, t) {
        if (e === t)return!1;
        if (e.contains && t.contains)return e.contains(t);
        for (; t = t.parentNode;)if (t === e)return!0;
        return!1
    }, t.dom.extend({contains: function (e) {
        var n = this[0];
        return e = t.dom(e)[0], n && e ? t._util_.contains(n, e) : !1
    }}), t._util_.smartInsertTo = function (e, n, r, o) {
        var i, a = t.dom(n), s = a[0];
        if (!o || !s || s.parentNode && 11 !== s.parentNode.nodeType)for (var u, c = 0; u = a[c]; c++)t._util_.smartInsert(t.dom(u), c > 0 ? e.clone(!0, !0) : e, r); else o = "before" === o, i = t.merge(o ? e : a, o ? a : e), e !== i && (e.length = 0, t.merge(e, i))
    }, t.dom.extend({appendTo: function (e) {
        return t.check("^(?:string|HTMLElement|\\$DOM)$", "baidu.dom.appendTo"), t._util_.smartInsertTo(this, e, function (e) {
            this.appendChild(e)
        }), this
    }}), t._util_.access = function (e, n, r, o, i) {
        if (0 >= e.size())return e;
        switch (t.type(n)) {
            case"string":
                if (void 0 === r)return o.call(e, e[0], n);
                e.each(function (a, s) {
                    o.call(e, s, n, "function" === t.type(r) ? r.call(s, a, o.call(e, s, n)) : r, i)
                });
                break;
            case"object":
                for (var a in n)t._util_.access(e, a, n[a], o, r)
        }
        return e
    }, t._util_.nodeName = function (e, t) {
        return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
    }, t._util_.propFixer = {tabindex: "tabIndex", readonly: "readOnly", "for": "htmlFor", "class": "className", classname: "className", maxlength: "maxLength", cellspacing: "cellSpacing", cellpadding: "cellPadding", rowspan: "rowSpan", colspan: "colSpan", usemap: "useMap", frameborder: "frameBorder", contenteditable: "contentEditable", rboolean: /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i}, !document.createElement("form").enctype && (t._util_.propFixer.enctype = "encoding"), t._util_.prop = function () {
        var e = /^(?:button|input|object|select|textarea)$/i, n = /^a(?:rea|)$/i, r = document.createElement("select"), o = r.appendChild(document.createElement("option")), i = {tabIndex: {get: function (t) {
            var r = t.getAttributeNode("tabindex");
            return r && r.specified ? parseInt(r.value, 10) : e.test(t.nodeName) || n.test(t.nodeName) && t.href ? 0 : void 0
        }}};
        return!o.selected && (i.selected = {get: function (e) {
            var t = e.parentNode;
            return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
        }}), r = o = null, function (e, n, r) {
            var o, a, s = e.nodeType;
            if (e && !~"238".indexOf(s))return 1 === s && t._util_.isXML(e) || (n = t._util_.propFixer[n] || n, o = i[n] || {}), void 0 !== r ? o.set && void 0 !== (a = o.set(e, n, r)) ? a : e[n] = r : o.get && null !== (a = o.get(e, n)) ? a : e[n]
        }
    }(), t._util_.support.getSetAttribute = "t" !== t._util_.support.dom.div.className, t._util_.nodeHook = function () {
        if (!t._util_.support.getSetAttribute) {
            var e = {};
            return e.name = e.id = e.coords = !0, {get: function (t, n) {
                var r = t.getAttributeNode(n);
                return r && (e[n] ? "" !== r.value : r.specified) ? r.value : void 0
            }, set: function (e, t, n) {
                var r = e.getAttributeNode(t);
                return r || (r = document.createAttribute(t), e.setAttributeNode(r)), r.value = n + ""
            }}
        }
    }(), t._util_.removeAttr = function () {
        var e = t._util_.propFixer, n = /\s+/, r = t._util_.support.getSetAttribute;
        return function (o, i) {
            if (i && 1 === o.nodeType)for (var a, s, u, c = i.split(n), l = 0; u = c[l]; l++)a = e[u] || u, s = e.rboolean.test(u), !s && t._util_.attr(o, u, ""), o.removeAttribute(r ? u : a), s && a in o && (o[a] = !1)
        }
    }(), t._util_.attr = function () {
        var e = t._util_, n = /^(?:button|input)$/i, r = e.support.dom, o = "t" === r.input.value, i = "/a" === r.a.getAttribute("href"), a = /top/.test(r.a.getAttribute("style")), s = e.nodeHook, u = {className: "class"}, c = {get: function (t, n) {
            var r, o = e.prop(t, n);
            return o === !0 || "boolean" != typeof o && (r = t.getAttributeNode(n)) && r.nodeValue !== !1 ? n.toLowerCase() : void 0
        }, set: function (t, n, r) {
            if (r === !1)e.removeAttr(t, n); else {
                var o = e.propFixer[n] || n;
                o in t && (t[o] = !0), t.setAttribute(n, n.toLowerCase())
            }
            return n
        }}, l = {type: {set: function (t, r, i) {
            if (n.test(t.nodeName) && t.parentNode)return i;
            if (!o && "radio" === i && e.nodeName(t, "input")) {
                var a = t.value;
                return t.setAttribute("type", i), a && (t.value = a), i
            }
        }}, value: {get: function (t, n) {
            return s && e.nodeName(t, "button") ? s.get(t, n) : n in t ? t.value : null
        }, set: function (t, n, r) {
            return s && e.nodeName(t, "button") ? s.set(t, n, r) : (t.value = r, void 0)
        }}};
        return e.support.getSetAttribute || (t.forEach(["width", "height"], function (e) {
            l[e] = {set: function (e, t, n) {
                return"" === n ? (e.setAttribute(t, "auto"), n) : void 0
            }}
        }), l.contenteditable = {get: s.get, set: function (e, t, n) {
            "" === n && (n = !1), s.set(e, t, n)
        }}), i || t.forEach(["href", "src", "width", "height"], function (e) {
            l[e] = {get: function (e, t) {
                var n = e.getAttribute(t, 2);
                return null === n ? void 0 : n
            }}
        }), a || (l.style = {get: function (e) {
            return e.style.cssText.toLowerCase() || void 0
        }, set: function (e, t, n) {
            return e.style.cssText = n + ""
        }}), function (n, r, o, i) {
            var a, f, d = n.nodeType, p = 1 !== d || !e.isXML(n);
            if (n && !~"238".indexOf(d))return i && t.dom.fn[r] ? t.dom(n)[r](o) : (p && (r = u[r] || r.toLowerCase(), a = l[r] || (e.propFixer.rboolean.test(r) ? c : s)), void 0 !== o ? null === o ? (e.removeAttr(n, r), void 0) : p && a && a.set && void 0 !== (f = a.set(n, r, o)) ? f : (n.setAttribute(r, o + ""), o) : p && a && a.get && null !== (f = a.get(n, r)) ? f : (f = n.getAttribute(r), null === f ? void 0 : f))
        }
    }(), t.dom.extend({attr: function (e, n) {
        return t._util_.access(this, e, n, function (e, n, r, o) {
            return t._util_.attr(e, n, r, o)
        })
    }}), t.dom.extend({before: function () {
        t.check("^(?:string|function|HTMLElement|\\$DOM)(?:,(?:string|array|HTMLElement|\\$DOM))*$", "baidu.dom.before");
        var e = this[0] && this[0].parentNode, n = !e && [];
        return t._util_.smartInsert(this, arguments, function (r) {
            e ? e.insertBefore(r, this) : t.merge(n, r.childNodes)
        }), n && (n = t.merge(n, this), this.length = 0, t.merge(this, n)), this
    }}), t.dom.extend({bind: function (e, t, n) {
        return this.on(e, void 0, t, n)
    }}), t.dom.match = function () {
        function e(e) {
            for (var t, n = []; e = e.parentNode;)e.nodeType && n.push(e);
            for (var t = n.length - 1; t > -1; t--)if (1 == n[t].nodeType || 9 == n[t].nodeType)return n[t];
            return null
        }

        var n = document.createElement("DIV");
        return n.id = "__tangram__", function (n, r, o) {
            var i, a = t.array();
            switch (t.type(r)) {
                case"$DOM":
                    for (var s = n.length - 1; s > -1; s--)for (var u = r.length - 1; u > -1; u--)n[s] === r[u] && a.push(n[s]);
                    break;
                case"function":
                    t.forEach(n, function (e, t) {
                        r.call(e, t) && a.push(e)
                    });
                    break;
                case"HTMLElement":
                    t.forEach(n, function (e) {
                        e == r && a.push(e)
                    });
                    break;
                case"string":
                    var c = t.query(r, o || document);
                    t.forEach(n, function (n) {
                        if (i = e(n))for (var o = 1 == i.nodeType ? t.query(r, i) : c, s = 0, u = o.length; u > s; s++)if (o[s] === n) {
                            a.push(n);
                            break
                        }
                    }), a = a.unique();
                    break;
                default:
                    a = t.array(n).unique()
            }
            return a
        }
    }(), t.dom.extend({children: function (e) {
        var n = [];
        return this.each(function () {
            t.forEach(this.children || this.childNodes, function (e) {
                1 == e.nodeType && n.push(e)
            })
        }), t.dom(t.dom.match(n, e))
    }}), t.dom.extend({closest: function (e, n) {
        var r = t.array();
        return t.forEach(this, function (o) {
            for (var i = [o]; o = o.parentNode;)o.nodeType && i.push(o);
            i = t.dom.match(i, e, n), i.length && r.push(i[0])
        }), t.dom(r.unique())
    }}), t.makeArray = function (e, n) {
        var r = n || [];
        return e ? (null == e.length || ~"string|function|regexp".indexOf(t.type(e)) ? [].push.call(r, e) : t.merge(r, e), r) : r
    }, t.dom.extend({contents: function () {
        for (var e, n, r = [], o = 0; n = this[o]; o++)e = n.nodeName, r.push.apply(r, t.makeArray(e && "iframe" === e.toLowerCase() ? n.contentDocument || n.contentWindow.document : n.childNodes));
        return this.length = 0, t.merge(this, r)
    }}), t.dom.extend({getComputedStyle: function (e) {
        if (this[0].ownerDocument) {
            var t = this[0].ownerDocument.defaultView, n = t && t.getComputedStyle && t.getComputedStyle(this[0], null), r = n ? n.getPropertyValue(e) || n[e] : "";
            return r || this[0].style[e]
        }
    }}), t.dom.extend({getCurrentStyle: function () {
        var e = document.documentElement.currentStyle ? function (e) {
            return this[0].currentStyle ? this[0].currentStyle[e] : this[0].style[e]
        } : function (e) {
            return this.getComputedStyle(e)
        };
        return function (t) {
            return e.call(this, t)
        }
    }()}), t._util_.getWidthOrHeight = function () {
        function e(e, t) {
            var n = {};
            for (var r in t)n[r] = e.style[r], e.style[r] = t[r];
            return n
        }

        var n = {}, r = {position: "absolute", visibility: "hidden", display: "block"}, o = /^(none|table(?!-c[ea]).+)/;
        return t.forEach(["Width", "Height"], function (i) {
            var a = {Width: ["Right", "Left"], Height: ["Top", "Bottom"]}[i];
            n["get" + i] = function (n, s) {
                var u = t.dom(n), c = 0 === n.offsetWidth && o.test(u.getCurrentStyle("display")) && e(n, r), l = n["offset" + i] || parseInt(u.getCurrentStyle(i.toLowerCase())) || 0, f = "padding|border";
                return s && t.forEach(s.split("|"), function (e) {
                    ~f.indexOf(e) ? f = f.replace(RegExp("\\|?" + e + "\\|?"), "") : (l += parseFloat(u.getCurrentStyle(e + a[0])) || 0, l += parseFloat(u.getCurrentStyle(e + a[1])) || 0)
                }), f && t.forEach(f.split("|"), function (e) {
                    l -= parseFloat(u.getCurrentStyle(e + a[0] + ("border" === e ? "Width" : ""))) || 0, l -= parseFloat(u.getCurrentStyle(e + a[1] + ("border" === e ? "Width" : ""))) || 0
                }), c && e(n, c), l
            }
        }), function (e, t, r) {
            return n["width" === t ? "getWidth" : "getHeight"](e, r)
        }
    }(), t.string.extend({toCamelCase: function () {
        var e = this.valueOf();
        return 0 > e.indexOf("-") && 0 > e.indexOf("_") ? e : e.replace(/[-_][^-_]/g, function (e) {
            return e.charAt(1).toUpperCase()
        })
    }}), t.dom.styleFixer = function () {
        var e = /alpha\s*\(\s*opacity\s*=\s*(\d{1,3})/i, n = /^-?(?:\d*\.)?\d+(?!px)[^\d\s]+$/i, r = "fillOpacity,fontWeight,opacity,orphans,widows,zIndex,zoom", o = t._util_.support.dom.a, i = {"float": o.style.cssFloat ? "cssFloat" : "styleFloat"}, a = {fontWeight: {normal: 400, bold: 700, bolder: 700, lighter: 100}}, s = {opacity: {}, width: {}, height: {}, fontWeight: {get: function (e, t) {
            var n = u.get(e, t);
            return a.fontWeight[n] || n
        }}}, u = {set: function (e, t, n) {
            e.style[t] = n
        }};
        return t.extend(s.opacity, /^0.5/.test(o.style.opacity) ? {get: function (e, n) {
            var r = t.dom(e).getCurrentStyle(n);
            return"" === r ? "1" : r
        }} : {get: function (t) {
            return e.test((t.currentStyle || t.style).filter || "") ? parseFloat(RegExp.$1) / 100 : "1"
        }, set: function (t, n, r) {
            var o = (t.currentStyle || t.style).filter || "", i = 100 * r;
            t.style.zoom = 1, t.style.filter = e.test(o) ? o.replace(e, "Alpha(opacity=" + i) : o + " progid:dximagetransform.microsoft.Alpha(opacity=" + i + ")"
        }}), t.forEach(["width", "height"], function (e) {
            s[e] = {get: function (n) {
                return t._util_.getWidthOrHeight(n, e) + "px"
            }, set: function (e, n, r) {
                "number" === t.type(r) && 0 > r && (r = 0), u.set(e, n, r)
            }}
        }), t.extend(u, document.documentElement.currentStyle ? {get: function (e, r) {
            var o, i = t.dom(e).getCurrentStyle(r);
            return n.test(i) && (o = e.style.left, e.style.left = "fontSize" === r ? "1em" : i, i = e.style.pixelLeft + "px", e.style.left = o), i
        }} : {get: function (e, n) {
            return t.dom(e).getCurrentStyle(n)
        }}), function (e, n, o) {
            var a, c, l = t.string(n).toCamelCase(), f = void 0 === o ? "get" : "set";
            return l = i[l] || l, a = "number" !== t.type(o) || ~r.indexOf(l) ? o : o + "px", c = s.hasOwnProperty(l) && s[l][f] || u[f], c(e, l, a)
        }
    }(), t.dom.extend({css: function (e, n) {
        return t.check("^(?:(?:string(?:,(?:number|string|function))?)|object)$", "baidu.dom.css"), t._util_.access(this, e, n, function (e, n, r) {
            var o = t.dom.styleFixer;
            return o ? o(e, n, r) : void 0 === r ? this.getCurrentStyle(n) : e.style[n] = r
        })
    }}), t.dom.extend({data: function () {
        var e = t.key, n = t.global("_maps_HTMLElementData");
        return function (r, o) {
            if (t.forEach(this, function (n) {
                !n[e] && (n[e] = t.id())
            }), t.isString(r)) {
                if (o === void 0) {
                    var i, a;
                    if (a = this[0] && (i = n[this[0][e]]) && i[r], a !== void 0)return a;
                    var s = this[0].getAttribute("data-" + r);
                    return~(s + "").indexOf("{") ? Function("return " + s)() : s
                }
                t.forEach(this, function (t) {
                    var i = n[t[e]] = n[t[e]] || {};
                    i[r] = o
                })
            } else"object" == t.type(r) && t.forEach(this, function (o) {
                var i = n[o[e]] = n[o[e]] || {};
                t.forEach(r, function (e, t) {
                    i[t] = r[t]
                })
            });
            return this
        }
    }()}), t.lang.Class = t.base.Class, t.lang.Event = t.base.Event, t.dom.extend({delegate: function (e, t, n, r) {
        return"function" == typeof n && (r = n, n = null), this.on(t, e, n, r)
    }}), t.dom.extend({filter: function (e) {
        return t.dom(t.dom.match(this, e))
    }}), t.dom.extend({remove: function (e, n) {
        arguments.length > 0 && t.check("^string(?:,boolean)?$", "baidu.dom.remove");
        for (var r, o = e ? this.filter(e) : this, i = 0; r = o[i]; i++)n || 1 !== r.nodeType || (t._util_.cleanData(r.getElementsByTagName("*")), t._util_.cleanData([r])), r.parentNode && r.parentNode.removeChild(r);
        return this
    }}), t.dom.extend({detach: function (e) {
        return e && t.check("^string$", "baidu.dom.detach"), this.remove(e, !0)
    }}), t.object.extend = t.extend, t.dom.getStyle = function (e, n) {
        return t.dom(t.dom.g(e)).css(n)
    }, t.page = t.page || {}, t.page.getScrollTop = function () {
        var e = document;
        return window.pageYOffset || e.documentElement.scrollTop || e.body.scrollTop
    }, t.page.getScrollLeft = function () {
        var e = document;
        return window.pageXOffset || e.documentElement.scrollLeft || e.body.scrollLeft
    }, function () {
        t.page.getMousePosition = function () {
            return{x: t.page.getScrollLeft() + e.x, y: t.page.getScrollTop() + e.y}
        };
        var e = {x: 0, y: 0};
        t.event.on(document, "onmousemove", function (t) {
            t = window.event || t, e.x = t.clientX, e.y = t.clientY
        })
    }(), t.dom.extend({off: function (e, n, r) {
        var o = t._util_.eventBase.core, i = this;
        return e ? "string" == typeof e ? ("function" == typeof n && (r = n, n = null), e = e.split(/[ ,]/), t.forEach(this, function (i) {
            t.forEach(e, function (e) {
                o.remove(i, e, r, n)
            })
        })) : "object" == typeof e && t.forEach(e, function (e, t) {
            i.off(t, n, e)
        }) : t.forEach(this, function (e) {
            o.remove(e)
        }), this
    }}), t.event.un = t.un = function (e, n, r) {
        return"string" == typeof e && (e = t.dom.g(e)), t.dom(e).off(n.replace(/^\s*on/, ""), r), e
    }, t.event.preventDefault = function (e) {
        return new t.event(e).preventDefault()
    }, function () {
        function e() {
            h = !1, clearInterval(u), i.capture && o.releaseCapture ? o.releaseCapture() : i.capture && window.releaseEvents && window.releaseEvents(Event.MOUSEMOVE | Event.MOUSEUP), document.body.style.MozUserSelect = p;
            var n = t.dom(document);
            n.off("selectstart", r), i.autoStop && n.off("mouseup", e), t.isFunction(i.ondragend) && i.ondragend(o, i, {left: f, top: d})
        }

        function n() {
            if (!h)return clearInterval(u), void 0;
            var e = i.range || [], n = t.page.getMousePosition(), r = c + n.x - a, p = l + n.y - s;
            t.isObject(e) && 4 == e.length && (r = Math.max(e[3], r), r = Math.min(e[1] - o.offsetWidth, r), p = Math.max(e[0], p), p = Math.min(e[2] - o.offsetHeight, p)), o.style.left = r + "px", o.style.top = p + "px", f = r, d = p, t.isFunction(i.ondrag) && i.ondrag(o, i, {left: f, top: d})
        }

        function r(e) {
            return t.event.preventDefault(e, !1)
        }

        var o, i, a, s, u, c, l, f, d, p, h = !1;
        t.dom.drag = function (m, g) {
            if (!(o = t.dom.g(m)))return!1;
            i = t.object.extend({autoStop: !0, capture: !0, interval: 16}, g), f = c = parseInt(t.dom.getStyle(o, "left")) || 0, d = l = parseInt(t.dom.getStyle(o, "top")) || 0, h = !0, setTimeout(function () {
                var e = t.page.getMousePosition();
                a = i.mouseEvent ? t.page.getScrollLeft() + i.mouseEvent.clientX : e.x, s = i.mouseEvent ? t.page.getScrollTop() + i.mouseEvent.clientY : e.y, clearInterval(u), u = setInterval(n, i.interval)
            }, 1);
            var y = t.dom(document);
            return i.autoStop && y.on("mouseup", e), y.on("selectstart", r), i.capture && o.setCapture ? o.setCapture() : i.capture && window.captureEvents && window.captureEvents(Event.MOUSEMOVE | Event.MOUSEUP), p = document.body.style.MozUserSelect, document.body.style.MozUserSelect = "none", t.isFunction(i.ondragstart) && i.ondragstart(o, i), {stop: e, dispose: e, update: function (e) {
                t.object.extend(i, e)
            }}
        }
    }(), t.lang.isFunction = t.isFunction, t.dom.extend({eq: function (e) {
        return t.check("number", "baidu.dom.eq"), t.dom(this.get(e))
    }}), t.dom.extend({find: function (e) {
        var n, r = [], o = "__tangram__find__", i = t.dom();
        switch (t.type(e)) {
            case"string":
                this.each(function () {
                    t.merge(i, t.query(e, this))
                });
                break;
            case"HTMLElement":
                n = e.tagName + "#" + (e.id ? e.id : e.id = o), this.each(function () {
                    t.query(n, this).length > 0 && r.push(e)
                }), e.id == o && (e.id = ""), r.length > 0 && t.merge(i, r);
                break;
            case"$DOM":
                r = e.get(), this.each(function () {
                    t.forEach(t.query("*", this), function (e) {
                        for (var t = 0, n = r.length; n > t; t++)e === r[t] && (i[i.length++] = r[t])
                    })
                })
        }
        return i
    }}), t.dom.extend({first: function () {
        return t.dom(this[0])
    }}), t.dom.getAttr = function (e, n) {
        return t.dom(t.dom.g(e)).attr(n)
    }, t.dom.extend({getWindow: function () {
        var e = this.getDocument();
        return 0 >= this.size() ? void 0 : e.parentWindow || e.defaultView
    }}), t.dom.extend({offsetParent: function () {
        return this.map(function () {
            for (var e = this.offsetParent || document.body, n = /^(?:body|html)$/i; e && "static" === t.dom(e).getCurrentStyle("position") && !n.test(e.nodeName);)e = e.offsetParent;
            return e
        })
    }}), t.dom.extend({position: function () {
        if (0 >= this.size())return 0;
        var e = /^(?:body|html)$/i, t = this.offset(), n = this.offsetParent(), r = e.test(n[0].nodeName) ? {left: 0, top: 0} : n.offset();
        return t.left -= parseFloat(this.getCurrentStyle("marginLeft")) || 0, t.top -= parseFloat(this.getCurrentStyle("marginTop")) || 0, r.left += parseFloat(n.getCurrentStyle("borderLeftWidth")) || 0, r.top += parseFloat(n.getCurrentStyle("borderTopWidth")) || 0, {left: t.left - r.left, top: t.top - r.top}
    }}), t.dom.extend({offset: function () {
        function e(e, n, r) {
            var o = o = t.dom(e), i = o.getCurrentStyle("position");
            "static" === i && (e.style.position = "relative");
            var a = o.offset(), s = o.getCurrentStyle("left"), u = o.getCurrentStyle("top"), c = ~"absolute|fixed".indexOf(i) && ~("" + s + u).indexOf("auto"), l = c && o.position();
            s = l && l.left || parseFloat(s) || 0, u = l && l.top || parseFloat(u) || 0, "function" === t.type("options") && (n = n.call(e, r, a)), void 0 != n.left && (e.style.left = n.left - a.left + s + "px"), void 0 != n.top && (e.style.top = n.top - a.top + u + "px")
        }

        return function (n) {
            if (n) {
                t.check("^(?:object|function)$", "baidu.dom.offset");
                for (var r, o = 0; r = this[o]; o++)e(r, n, o);
                return this
            }
            var i, a, s = this[0], u = this.getDocument(), c = {left: 0, top: 0};
            if (u)return a = u.documentElement, t._util_.contains(a, s) ? (s.getBoundingClientRect !== void 0 && (c = s.getBoundingClientRect()), i = this.getWindow(), {left: c.left + (i.pageXOffset || a.scrollLeft) - (a.clientLeft || 0), top: c.top + (i.pageYOffset || a.scrollTop) - (a.clientTop || 0)}) : c
        }
    }()}), t.dom.extend({has: function (e) {
        var n = [], r = t.dom(document.body);
        return t.forEach(this, function (t) {
            r[0] = t, r.find(e).length && n.push(t)
        }), t.dom(n)
    }}), t.dom.extend({hasClass: function (e) {
        if (0 >= arguments.length || "function" == typeof e)return this;
        if (0 >= this.size())return!1;
        e = e.replace(/^\s+/g, "").replace(/\s+$/g, "").replace(/\s+/g, " ");
        var n, r = e.split(" ");
        return t.forEach(this, function (e) {
            for (var t = e.className, o = 0; r.length > o; o++)if (!~(" " + t + " ").indexOf(" " + r[o] + " "))return n = !1, void 0;
            return n !== !1 ? (n = !0, void 0) : void 0
        }), n
    }}), t._util_.getWindowOrDocumentWidthOrHeight = t._util_.getWindowOrDocumentWidthOrHeight || function () {
        var e = {window: {}, document: {}};
        return t.forEach(["Width", "Height"], function (n) {
            var r = "client" + n, o = "offset" + n, i = "scroll" + n;
            e.window["get" + n] = function (e) {
                var n = e.document, o = n.documentElement[r];
                return t.browser.isStrict && o || n.body && n.body[r] || o
            }, e.document["get" + n] = function (e) {
                var t = e.documentElement;
                return t[r] >= t[i] ? t[r] : Math.max(e.body[i], t[i], e.body[o], t[o])
            }
        }), function (t, n, r) {
            return e[n]["width" === r ? "getWidth" : "getHeight"](t)
        }
    }(), t.dom.extend({height: function (e) {
        return t._util_.access(this, "height", e, function (e, n, r) {
            var o = void 0 !== r, i = o && parseFloat(r), a = null != e && e == e.window ? "window" : 9 === e.nodeType ? "document" : !1;
            if (!(o && 0 > i || isNaN(i)))return o && /^(?:\d*\.)?\d+$/.test(r += "") && (r += "px"), a ? t._util_.getWindowOrDocumentWidthOrHeight(e, a, n) : o ? e.style.height = r : t._util_.getWidthOrHeight(e, n)
        })
    }}), t.dom.extend({hide: function () {
        return this.each(function (e, t) {
            t.style && (t.style.display = "none")
        })
    }}), t.dom.extend({innerHeight: function () {
        if (0 >= this.size())return 0;
        var e = this[0], n = null != e && e === e.window ? "window" : 9 === e.nodeType ? "document" : !1;
        return n ? t._util_.getWindowOrDocumentWidthOrHeight(e, n, "height") : t._util_.getWidthOrHeight(e, "height", "padding")
    }}), t.dom.extend({innerWidth: function () {
        if (0 >= this.size())return 0;
        var e = this[0], n = null != e && e === e.window ? "window" : 9 === e.nodeType ? "document" : !1;
        return n ? t._util_.getWindowOrDocumentWidthOrHeight(e, n, "width") : t._util_.getWidthOrHeight(e, "width", "padding")
    }}), t.dom.extend({insertAfter: function (e) {
        return t.check("^(?:string|HTMLElement|\\$DOM)$", "baidu.dom.insertAfter"), t._util_.smartInsertTo(this, e, function (e) {
            this.parentNode.insertBefore(e, this.nextSibling)
        }, "after"), this
    }}), t.dom.extend({insertBefore: function (e) {
        return t.check("^(?:string|HTMLElement|\\$DOM)$", "baidu.dom.insertBefore"), t._util_.smartInsertTo(this, e, function (e) {
            this.parentNode.insertBefore(e, this)
        }, "before"), this
    }}), t.dom.extend({insertHTML: function (e, n) {
        var r, o, i = this[0];
        return i.insertAdjacentHTML && !t.browser.opera ? i.insertAdjacentHTML(e, n) : (r = i.ownerDocument.createRange(), e = e.toUpperCase(), "AFTERBEGIN" == e || "BEFOREEND" == e ? (r.selectNodeContents(i), r.collapse("AFTERBEGIN" == e)) : (o = "BEFOREBEGIN" == e, r[o ? "setStartBefore" : "setEndAfter"](i), r.collapse(o)), r.insertNode(r.createContextualFragment(n))), i
    }}), t.dom.extend({is: function (e) {
        return t.dom.match(this, e).length > 0
    }}), t.dom.extend({last: function () {
        return t.dom(this.get(-1))
    }}), t.dom.extend({next: function (e) {
        var n = t.dom();
        return t.forEach(this, function (e) {
            for (; (e = e.nextSibling) && e && 1 != e.nodeType;);
            e && (n[n.length++] = e)
        }), e ? n.filter(e) : n
    }}), t.dom.extend({nextAll: function (e) {
        var n = [];
        return t.forEach(this, function (e) {
            for (; e = e.nextSibling;)e && 1 == e.nodeType && n.push(e)
        }), t.dom(t.dom.match(n, e))
    }}), t.dom.extend({nextUntil: function (e, n) {
        var r = t.array();
        return t.forEach(this, function (n) {
            for (var o = t.array(); n = n.nextSibling;)n && 1 == n.nodeType && o.push(n);
            if (e && o.length) {
                var i = t.dom.match(o, e);
                i.length && (o = o.slice(0, o.indexOf(i[0])))
            }
            t.merge(r, o)
        }), t.dom(t.dom.match(r, n))
    }}), t.dom.extend({not: function (e) {
        var n, r, o, i = this.get(), a = t.isArray(e) ? e : t.dom.match(this, e);
        for (n = i.length - 1; n > -1; n--)for (r = 0, o = a.length; o > r; r++)a[r] === i[n] && i.splice(n, 1);
        return t.dom(i)
    }}), t.dom.extend({one: function (e, t, n, r) {
        return this.on(e, t, n, r, 1)
    }}), t.dom.extend({outerHeight: function (e) {
        if (0 >= this.size())return 0;
        var n = this[0], r = null != n && n === n.window ? "window" : 9 === n.nodeType ? "document" : !1;
        return r ? t._util_.getWindowOrDocumentWidthOrHeight(n, r, "height") : t._util_.getWidthOrHeight(n, "height", "padding|border" + (e ? "|margin" : ""))
    }}), t.dom.extend({outerWidth: function (e) {
        if (0 >= this.size())return 0;
        var n = this[0], r = null != n && n === n.window ? "window" : 9 === n.nodeType ? "document" : !1;
        return r ? t._util_.getWindowOrDocumentWidthOrHeight(n, r, "width") : t._util_.getWidthOrHeight(n, "width", "padding|border" + (e ? "|margin" : ""))
    }}), t.dom.extend({parent: function (e) {
        var n = [];
        return t.forEach(this, function (e) {
            (e = e.parentNode) && 1 == e.nodeType && n.push(e)
        }), t.dom(t.dom.match(n, e))
    }}), t.dom.extend({parents: function (e) {
        var n = [];
        return t.forEach(this, function (e) {
            for (var r = []; (e = e.parentNode) && 1 == e.nodeType;)r.push(e);
            t.merge(n, r)
        }), t.dom(t.dom.match(n, e))
    }}), t.dom.extend({parentsUntil: function (e, n) {
        t.check("(string|HTMLElement)(,.+)?", "baidu.dom.parentsUntil");
        var r = [];
        return t.forEach(this, function (n) {
            for (var o = t.array(); (n = n.parentNode) && 1 == n.nodeType;)o.push(n);
            if (e && o.length) {
                var i = t.dom.match(o, e);
                i.length && (o = o.slice(0, o.indexOf(i[0])))
            }
            t.merge(r, o)
        }), t.dom(t.dom.match(r, n))
    }}), t.dom.extend({prepend: function () {
        return t.check("^(?:string|function|HTMLElement|\\$DOM)(?:,(?:string|array|HTMLElement|\\$DOM))*$", "baidu.dom.prepend"), t._util_.smartInsert(this, arguments, function (e) {
            1 === this.nodeType && this.insertBefore(e, this.firstChild)
        }), this
    }}), t.dom.extend({prependTo: function (e) {
        return t.check("^(?:string|HTMLElement|\\$DOM)$", "baidu.dom.prependTo"), t._util_.smartInsertTo(this, e, function (e) {
            this.insertBefore(e, this.firstChild)
        }), this
    }}), t.dom.extend({prev: function (e) {
        var n = [];
        return t.forEach(this, function (e) {
            for (; e = e.previousSibling;)if (1 == e.nodeType) {
                n.push(e);
                break
            }
        }), t.dom(t.dom.match(n, e))
    }}), t.dom.extend({prevAll: function (e) {
        var n = t.array();
        return t.forEach(this, function (e) {
            for (var r = []; e = e.previousSibling;)1 == e.nodeType && r.push(e);
            t.merge(n, r.reverse())
        }), t.dom("string" == typeof e ? t.dom.match(n, e) : n.unique())
    }}), t.dom.extend({prevUntil: function (e, n) {
        t.check("(string|HTMLElement)(,.+)?", "baidu.dom.prevUntil");
        var r = [];
        return t.forEach(this, function (n) {
            for (var o = t.array(); n = n.previousSibling;)n && 1 == n.nodeType && o.push(n);
            if (e && o.length) {
                var i = t.dom.match(o, e);
                i.length && (o = o.slice(0, o.indexOf(i[0])))
            }
            t.merge(r, o)
        }), t.dom(t.dom.match(r, n))
    }}), t.dom.extend({prop: function (e, n) {
        return t._util_.access(this, e, n, function (e, n, r) {
            return t._util_.prop(e, n, r)
        })
    }}), t.string.extend({escapeReg: function () {
        return this.replace(RegExp("([.*+?^=!:${}()|[\\]/\\\\])", "g"), "\\$1")
    }}), void function (e, n) {
        function r(e, t, n, r) {
            var o, i, u, c, l = s++, f = 0, d = t.length;
            for ("string" != typeof n || m.test(n) || (n = n.toLowerCase(), c = n); d > f; f++)if (o = t[f]) {
                for (i = !1, o = o[e]; o;) {
                    if (o[a] === l) {
                        i = t[o.sizset];
                        break
                    }
                    if (u = 1 === o.nodeType, u && !r && (o[a] = l, o.sizset = f), c) {
                        if (o.nodeName.toLowerCase() === n) {
                            i = o;
                            break
                        }
                    } else if (u)if ("string" != typeof n) {
                        if (o === n) {
                            i = !0;
                            break
                        }
                    } else if (I(n, [o]).length > 0) {
                        i = o;
                        break
                    }
                    o = o[e]
                }
                t[f] = i
            }
        }

        t.query = function (e, n, r) {
            return t.merge(r || [], t.sizzle(e, n))
        };
        var o = e.document, i = o.documentElement, a = "sizcache" + (Math.random() + "").replace(".", ""), s = 0, u = Object.prototype.toString, c = "undefined", l = !1, f = !0, d = /^#([\w\-]+$)|^(\w+$)|^\.([\w\-]+$)/, p = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g, h = /\\/g, m = /\W/, g = /^\w/, y = /\D/, v = /(-?)(\d*)(?:n([+\-]?\d*))?/, b = /^\+|\s*/g, x = /h\d/i, w = /input|select|textarea|button/i, _ = /[\t\n\f\r]/g, E = "(?:[-\\w]|[^\\x00-\\xa0]|\\\\.)", T = {ID: RegExp("#(" + E + "+)"), CLASS: RegExp("\\.(" + E + "+)"), NAME: RegExp("\\[name=['\"]*(" + E + "+)['\"]*\\]"), TAG: RegExp("^(" + E.replace("[-", "[-\\*") + "+)"), ATTR: RegExp("\\[\\s*(" + E + "+)\\s*(?:(\\S?=)\\s*(?:(['\"])(.*?)\\3|(#?" + E + "*)|)|)\\s*\\]"), PSEUDO: RegExp(":(" + E + "+)(?:\\((['\"]?)((?:\\([^\\)]+\\)|[^\\(\\)]*)+)\\2\\))?"), CHILD: /:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/, POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/}, C = T.POS, S = function () {
            var e, t = function (e, t) {
                return"\\" + (t - 0 + 1)
            }, n = {};
            for (e in T)T[e] = RegExp(T[e].source + /(?![^\[]*\])(?![^\(]*\))/.source), n[e] = RegExp(/(^(?:.|\r|\n)*?)/.source + T[e].source.replace(/\\(\d+)/g, t));
            return T.globalPOS = C, n
        }(), N = function (e) {
            var t = !1, n = o.createElement("div");
            try {
                t = e(n)
            } catch (r) {
            }
            return n = null, t
        }, A = N(function (e) {
            var t = !0, n = "script" + (new Date).getTime();
            return e.innerHTML = "<a name ='" + n + "'/>", i.insertBefore(e, i.firstChild), o.getElementById(n) && (t = !1), i.removeChild(e), t
        }), O = N(function (e) {
            return e.appendChild(o.createComment("")), 0 === e.getElementsByTagName("*").length
        }), k = N(function (e) {
            return e.innerHTML = "<a href='#'></a>", e.firstChild && typeof e.firstChild.getAttribute !== c && "#" === e.firstChild.getAttribute("href")
        }), L = N(function (e) {
            return e.innerHTML = "<div class='test e'></div><div class='test'></div>", e.getElementsByClassName && 0 !== e.getElementsByClassName("e").length ? (e.lastChild.className = "e", 1 !== e.getElementsByClassName("e").length) : !1
        });
        [0, 0].sort(function () {
            return f = !1, 0
        });
        var j = function (e, r, i) {
            i = i || [], r = r || o;
            var a, s, u, c = r.nodeType;
            if (1 !== c && 9 !== c)return[];
            if (!e || "string" != typeof e)return i;
            if (e = t.string(e).trim(), !e)return i;
            if (u = D(r), !u && (a = d.exec(e)))if (a[1]) {
                if (9 === c) {
                    if (s = r.getElementById(a[1]), !s || !s.parentNode)return $([], i);
                    if (s.id === a[1])return $([s], i)
                } else if (r.ownerDocument && (s = r.ownerDocument.getElementById(a[1])) && F(r, s) && s.id === a[1])return $([s], i)
            } else {
                if (a[2])return"body" === e && r.body ? $([r.body], i) : $(r.getElementsByTagName(e), i);
                if (L && a[3] && r.getElementsByClassName)return $(r.getElementsByClassName(a[3]), i)
            }
            return M(e, r, i, n, u)
        }, M = function (e, t, n, r, o) {
            var i, a, s, c, l, f, d, h, m = t, g = !0, y = [], v = e;
            do if (p.exec(""), i = p.exec(v), i && (v = i[3], y.push(i[1]), i[2])) {
                c = i[3];
                break
            } while (i);
            if (y.length > 1 && C.exec(e))if (2 === y.length && P.relative[y[0]])a = X(y[0] + y[1], t, r, o); else for (a = P.relative[y[0]] ? [t] : j(y.shift(), t); y.length;)e = y.shift(), P.relative[e] && (e += y.shift()), a = X(e, a, r, o); else if (!r && y.length > 1 && 9 === t.nodeType && !o && T.ID.test(y[0]) && !T.ID.test(y[y.length - 1]) && (l = B(y.shift(), t, o), t = l.expr ? I(l.expr, l.set)[0] : l.set[0]), t)for (l = r ? {expr: y.pop(), set: $(r)} : B(y.pop(), y.length >= 1 && ("~" === y[0] || "+" === y[0]) && t.parentNode || t, o), a = l.expr ? I(l.expr, l.set) : l.set, y.length > 0 ? s = $(a) : g = !1; y.length;)f = y.pop(), d = f, P.relative[f] ? d = y.pop() : f = "", null == d && (d = t), P.relative[f](s, d, o); else s = y = [];
            if (s || (s = a), s || R(f || e), "[object Array]" === u.call(s))if (g)if (t && 1 === t.nodeType)for (h = 0; null != s[h]; h++)s[h] && (s[h] === !0 || 1 === s[h].nodeType && F(t, s[h])) && n.push(a[h]); else for (h = 0; null != s[h]; h++)s[h] && 1 === s[h].nodeType && n.push(a[h]); else n.push.apply(n, s); else $(s, n);
            return c && (M(c, m, n, r, o), H(n)), n
        }, D = t._util_.isXML, $ = t.makeArray, H = function (e) {
            if (q && (l = f, e.sort(q), l))for (var t = 1; e.length > t; t++)e[t] === e[t - 1] && e.splice(t--, 1);
            return e
        }, F = t._util_.contains, B = function (e, t, n) {
            var r, o, i, a, s, u;
            if (!e)return[];
            for (o = 0, i = P.order.length; i > o; o++)if (s = P.order[o], (a = S[s].exec(e)) && (u = a[1], a.splice(1, 1), "\\" !== u.substr(u.length - 1) && (a[1] = (a[1] || "").replace(h, ""), r = P.find[s](a, t, n), null != r))) {
                e = e.replace(T[s], "");
                break
            }
            return r || (r = typeof t.getElementsByTagName !== c ? t.getElementsByTagName("*") : []), {set: r, expr: e}
        }, I = function (e, t, r, o) {
            for (var i, a, s, u, c, l, f, d, p, h = e, m = [], g = t, y = t && t[0] && D(t[0]); e && t.length;) {
                for (s in P.filter)if (null != (i = S[s].exec(e)) && i[2]) {
                    if (l = P.filter[s], f = i[1], a = !1, i.splice(1, 1), "\\" === f.substr(f.length - 1))continue;
                    if (g === m && (m = []), P.preFilter[s])if (i = P.preFilter[s](i, g, r, m, o, y)) {
                        if (i === !0)continue
                    } else a = u = !0;
                    if (i)for (d = 0; null != (c = g[d]); d++)c && (u = l(c, i, d, g), p = o ^ u, r && null != u ? p ? a = !0 : g[d] = !1 : p && (m.push(c), a = !0));
                    if (u !== n) {
                        if (r || (g = m), e = e.replace(T[s], ""), !a)return[];
                        break
                    }
                }
                if (e === h) {
                    if (null != a)break;
                    R(e)
                }
                h = e
            }
            return g
        }, R = function (e) {
            throw Error(e)
        }, W = function (e) {
            var t, n, r = e.nodeType, o = "";
            if (r) {
                if (1 === r || 9 === r || 11 === r) {
                    if ("string" == typeof e.textContent)return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling)o += W(e)
                } else if (3 === r || 4 === r)return e.nodeValue
            } else for (t = 0; n = e[t]; t++)8 !== n.nodeType && (o += W(n));
            return o
        }, P = {match: T, leftMatch: S, order: ["ID", "NAME", "TAG"], attrMap: {"class": "className", "for": "htmlFor"}, attrHandle: {href: k ? function (e) {
            return e.getAttribute("href")
        } : function (e) {
            return e.getAttribute("href", 2)
        }, type: function (e) {
            return e.getAttribute("type")
        }}, relative: {"+": function (e, t) {
            var n = "string" == typeof t, r = n && !m.test(t), o = n && !r;
            r && (t = t.toLowerCase());
            for (var i, a = 0, s = e.length; s > a; a++)if (i = e[a]) {
                for (; (i = i.previousSibling) && 1 !== i.nodeType;);
                e[a] = o || i && i.nodeName.toLowerCase() === t ? i || !1 : i === t
            }
            o && I(t, e, !0)
        }, ">": function (e, t) {
            var n, r = "string" == typeof t, o = 0, i = e.length;
            if (r && !m.test(t)) {
                for (t = t.toLowerCase(); i > o; o++)if (n = e[o]) {
                    var a = n.parentNode;
                    e[o] = a.nodeName.toLowerCase() === t ? a : !1
                }
            } else {
                for (; i > o; o++)n = e[o], n && (e[o] = r ? n.parentNode : n.parentNode === t);
                r && I(t, e, !0)
            }
        }, "": function (e, t, n) {
            r("parentNode", e, t, n)
        }, "~": function (e, t, n) {
            r("previousSibling", e, t, n)
        }}, find: {ID: A ? function (e, t, n) {
            if (typeof t.getElementById !== c && !n) {
                var r = t.getElementById(e[1]);
                return r && r.parentNode ? [r] : []
            }
        } : function (e, t, r) {
            if (typeof t.getElementById !== c && !r) {
                var o = t.getElementById(e[1]);
                return o ? o.id === e[1] || typeof o.getAttributeNode !== c && o.getAttributeNode("id").nodeValue === e[1] ? [o] : n : []
            }
        }, NAME: function (e, t) {
            if (typeof t.getElementsByName !== c) {
                for (var n = [], r = t.getElementsByName(e[1]), o = 0, i = r.length; i > o; o++)r[o].getAttribute("name") === e[1] && n.push(r[o]);
                return 0 === n.length ? null : n
            }
        }, TAG: O ? function (e, t) {
            return typeof t.getElementsByTagName !== c ? t.getElementsByTagName(e[1]) : n
        } : function (e, t) {
            var n = t.getElementsByTagName(e[1]);
            if ("*" === e[1]) {
                for (var r = [], o = 0; n[o]; o++)1 === n[o].nodeType && r.push(n[o]);
                n = r
            }
            return n
        }}, preFilter: {CLASS: function (e, t, n, r, o, i) {
            if (e = " " + e[1].replace(h, "") + " ", i)return e;
            for (var a, s = 0; null != (a = t[s]); s++)a && (o ^ (a.className && ~(" " + a.className + " ").replace(_, " ").indexOf(e)) ? n || r.push(a) : n && (t[s] = !1));
            return!1
        }, ID: function (e) {
            return e[1].replace(h, "")
        }, TAG: function (e) {
            return e[1].replace(h, "").toLowerCase()
        }, CHILD: function (e) {
            if ("nth" === e[1]) {
                e[2] || R(e[0]), e[2] = e[2].replace(b, "");
                var t = v.exec("even" === e[2] && "2n" || "odd" === e[2] && "2n+1" || !y.test(e[2]) && "0n+" + e[2] || e[2]);
                e[2] = t[1] + (t[2] || 1) - 0, e[3] = t[3] - 0
            } else e[2] && R(e[0]);
            return e[0] = s++, e
        }, ATTR: function (e, t, n, r, o, i) {
            var a = e[1] = e[1].replace(h, "");
            return!i && P.attrMap[a] && (e[1] = P.attrMap[a]), e[4] = (e[4] || e[5] || "").replace(h, ""), "~=" === e[2] && (e[4] = " " + e[4] + " "), e
        }, PSEUDO: function (e, t, n, r, i, a) {
            if ("not" === e[1]) {
                if (!((p.exec(e[3]) || "").length > 1 || g.test(e[3]))) {
                    var s = I(e[3], t, n, !i);
                    return n || r.push.apply(r, s), !1
                }
                e[3] = M(e[3], o, [], t, a)
            } else if (T.POS.test(e[0]) || T.CHILD.test(e[0]))return!0;
            return e
        }, POS: function (e) {
            return e.unshift(!0), e
        }}, filters: {enabled: function (e) {
            return e.disabled === !1
        }, disabled: function (e) {
            return e.disabled === !0
        }, checked: function (e) {
            var t = e.nodeName.toLowerCase();
            return"input" === t && !!e.checked || "option" === t && !!e.selected
        }, selected: function (e) {
            return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
        }, parent: function (e) {
            return!!e.firstChild
        }, empty: function (e) {
            return!e.firstChild
        }, has: function (e, t, n) {
            return!!j(n[3], e).length
        }, header: function (e) {
            return x.test(e.nodeName)
        }, text: function (e) {
            var t = e.getAttribute("type"), n = e.type;
            return"input" === e.nodeName.toLowerCase() && "text" === n && (null === t || t.toLowerCase() === n)
        }, radio: function (e) {
            return"input" === e.nodeName.toLowerCase() && "radio" === e.type
        }, checkbox: function (e) {
            return"input" === e.nodeName.toLowerCase() && "checkbox" === e.type
        }, file: function (e) {
            return"input" === e.nodeName.toLowerCase() && "file" === e.type
        }, password: function (e) {
            return"input" === e.nodeName.toLowerCase() && "password" === e.type
        }, submit: function (e) {
            var t = e.nodeName.toLowerCase();
            return("input" === t || "button" === t) && "submit" === e.type
        }, image: function (e) {
            return"input" === e.nodeName.toLowerCase() && "image" === e.type
        }, reset: function (e) {
            var t = e.nodeName.toLowerCase();
            return("input" === t || "button" === t) && "reset" === e.type
        }, button: function (e) {
            var t = e.nodeName.toLowerCase();
            return"input" === t && "button" === e.type || "button" === t
        }, input: function (e) {
            return w.test(e.nodeName)
        }, focus: function (e) {
            var t = e.ownerDocument;
            return!(e !== t.activeElement || t.hasFocus && !t.hasFocus() || !e.type && !e.href)
        }, active: function (e) {
            return e === e.ownerDocument.activeElement
        }, contains: function (e, t, n) {
            return(e.textContent || e.innerText || W(e)).indexOf(n[3]) >= 0
        }}, setFilters: {first: function (e, t) {
            return 0 === t
        }, last: function (e, t, n, r) {
            return t === r.length - 1
        }, even: function (e, t) {
            return 0 === t % 2
        }, odd: function (e, t) {
            return 1 === t % 2
        }, lt: function (e, t, n) {
            return n[3] - 0 > t
        }, gt: function (e, t, n) {
            return t > n[3] - 0
        }, nth: function (e, t, n) {
            return n[3] - 0 === t
        }, eq: function (e, t, n) {
            return n[3] - 0 === t
        }}, filter: {PSEUDO: function (e, t, n, r) {
            var o = t[1], i = P.filters[o];
            if (i)return i(e, n, t, r);
            if ("not" === o) {
                for (var a = t[3], s = 0, u = a.length; u > s; s++)if (a[s] === e)return!1;
                return!0
            }
            R(o)
        }, CHILD: function (e, t) {
            var n, r, o, i, s, u, c = t[1], l = e;
            switch (c) {
                case"only":
                case"first":
                    for (; l = l.previousSibling;)if (1 === l.nodeType)return!1;
                    if ("first" === c)return!0;
                    l = e;
                case"last":
                    for (; l = l.nextSibling;)if (1 === l.nodeType)return!1;
                    return!0;
                case"nth":
                    if (n = t[2], r = t[3], 1 === n && 0 === r)return!0;
                    if (o = t[0], i = e.parentNode, i && (i[a] !== o || !e.nodeIndex)) {
                        for (s = 0, l = i.firstChild; l; l = l.nextSibling)1 === l.nodeType && (l.nodeIndex = ++s);
                        i[a] = o
                    }
                    return u = e.nodeIndex - r, 0 === n ? 0 === u : 0 === u % n && u / n >= 0
            }
        }, ID: A ? function (e, t) {
            return 1 === e.nodeType && e.getAttribute("id") === t
        } : function (e, t) {
            var n = typeof e.getAttributeNode !== c && e.getAttributeNode("id");
            return 1 === e.nodeType && n && n.nodeValue === t
        }, TAG: function (e, t) {
            return"*" === t && 1 === e.nodeType || !!e.nodeName && e.nodeName.toLowerCase() === t
        }, CLASS: function (e, t) {
            return(" " + (e.className || e.getAttribute("class")) + " ").indexOf(t) > -1
        }, ATTR: function (e, t) {
            var n = t[1], r = P.attrHandle[n] ? P.attrHandle[n](e) : null != e[n] ? e[n] : e.getAttribute(n), o = r + "", i = t[2], a = t[4];
            return null == r ? "!=" === i : "=" === i ? o === a : "*=" === i ? o.indexOf(a) >= 0 : "~=" === i ? (" " + o + " ").indexOf(a) >= 0 : a ? "!=" === i ? o !== a : "^=" === i ? 0 === o.indexOf(a) : "$=" === i ? o.substr(o.length - a.length) === a : "|=" === i ? o === a || o.substr(0, a.length + 1) === a + "-" : !1 : o && r !== !1
        }, POS: function (e, t, r, o) {
            var i = t[2], a = P.setFilters[i];
            return a ? a(e, r, t, o) : n
        }}};
        L && (P.order.splice(1, 0, "CLASS"), P.find.CLASS = function (e, t, r) {
            return typeof t.getElementsByClassName === c || r ? n : t.getElementsByClassName(e[1])
        });
        var q, z;
        i.compareDocumentPosition ? q = function (e, t) {
            return e === t ? (l = !0, 0) : e.compareDocumentPosition && t.compareDocumentPosition ? 4 & e.compareDocumentPosition(t) ? -1 : 1 : e.compareDocumentPosition ? -1 : 1
        } : (q = function (e, t) {
            if (e === t)return l = !0, 0;
            if (e.sourceIndex && t.sourceIndex)return e.sourceIndex - t.sourceIndex;
            var n, r, o = [], i = [], a = e.parentNode, s = t.parentNode, u = a;
            if (a === s)return z(e, t);
            if (!a)return-1;
            if (!s)return 1;
            for (; u;)o.unshift(u), u = u.parentNode;
            for (u = s; u;)i.unshift(u), u = u.parentNode;
            n = o.length, r = i.length;
            for (var c = 0; n > c && r > c; c++)if (o[c] !== i[c])return z(o[c], i[c]);
            return c === n ? z(e, i[c], -1) : z(o[c], t, 1)
        }, z = function (e, t, n) {
            if (e === t)return n;
            for (var r = e.nextSibling; r;) {
                if (r === t)return-1;
                r = r.nextSibling
            }
            return 1
        }), o.querySelectorAll && function () {
            var e = M, t = "__sizzle__", n = /^\s*[+~]/, r = /'/g, o = [];
            N(function (e) {
                e.innerHTML = "<select><option selected></option></select>", e.querySelectorAll("[selected]").length || o.push("\\[[\\x20\\t\\n\\r\\f]*(?:checked|disabled|ismap|multiple|readonly|selected|value)"), e.querySelectorAll(":checked").length || o.push(":checked")
            }), N(function (e) {
                e.innerHTML = "<p class=''></p>", e.querySelectorAll("[class^='']").length && o.push("[*^$]=[\\x20\\t\\n\\r\\f]*(?:\"\"|'')"), e.innerHTML = "<input type='hidden'>", e.querySelectorAll(":enabled").length || o.push(":enabled", ":disabled")
            }), o = o.length && RegExp(o.join("|")), M = function (i, a, s, u, c) {
                if (!(u || c || o && o.test(i)))if (9 === a.nodeType)try {
                    return $(a.querySelectorAll(i), s)
                } catch (l) {
                } else if (1 === a.nodeType && "object" !== a.nodeName.toLowerCase()) {
                    var f = a, d = a.getAttribute("id"), p = d || t, h = a.parentNode, m = n.test(i);
                    d ? p = p.replace(r, "\\$&") : a.setAttribute("id", p), m && h && (a = h);
                    try {
                        if (!m || h)return $(a.querySelectorAll("[id='" + p + "'] " + i), s)
                    } catch (l) {
                    } finally {
                        d || f.removeAttribute("id")
                    }
                }
                return e(i, a, s, u, c)
            }
        }();
        var X = function (e, t, n, r) {
            for (var o, i = [], a = "", s = t.nodeType ? [t] : t, u = 0, c = s.length; o = T.PSEUDO.exec(e);)a += o[0], e = e.replace(T.PSEUDO, "");
            for (P.relative[e] && (e += "*"); c > u; u++)M(e, s[u], i, n, r);
            return I(a, i)
        };
        e.Sizzle = t.sizzle = j, t.query.matches = function (e, t) {
            return M(e, o, [], t, D(o))
        }
    }(window), t.dom.extend({ready: function () {
        var e, n = this, r = window.document;
        t._util_.isDomReady = !1, t._util_._readyWait = 1, t.dom.holdReady = function (e) {
            e ? t._util_.readyWait++ : o(!0)
        };
        var o = function (n) {
            if (n === !0 ? !--t._util_.readyWait : !t._util_.isDomReady) {
                if (!r.body)return setTimeout(o, 1);
                t._util_.isReady = !0, n !== !0 && --t._util_.readyWait > 0 || (e.resolveWith(r), t.dom.trigger && t.dom(r).trigger("ready").off("ready"))
            }
        }, i = function () {
            r.addEventListener ? (r.removeEventListener("DOMContentLoaded", i, !1), o()) : "complete" === r.readyState && (r.detachEvent("onreadystatechange", i), o())
        }, a = function (n) {
            if (!e)if (e = t.Deferred(), "complete" === r.readyState)setTimeout(o, 1); else if (r.addEventListener)r.addEventListener("DOMContentLoaded", i, !1), window.addEventListener("load", o, !1); else {
                r.attachEvent("onreadystatechange", i), window.attachEvent("onload", o);
                var a = !1;
                try {
                    a = null == window.frameElement && r.documentElement
                } catch (s) {
                }
                a && a.doScroll && function u() {
                    if (!t._util_.isDomReady) {
                        try {
                            a.doScroll("left")
                        } catch (e) {
                            return setTimeout(u, 50)
                        }
                        o()
                    }
                }()
            }
            return e.promise(n)
        };
        return function (e) {
            return a().done(e), n
        }
    }()}), t.dom.extend({removeAttr: function (e) {
        return this.each(function (n, r) {
            t._util_.removeAttr(r, e)
        }), this
    }}), t.dom.extend({removeClass: function (e) {
        var n = typeof e, r = " ";
        if (arguments.length || t.forEach(this, function (e) {
            e.className = ""
        }), "string" == n) {
            e = t.string.trim(e);
            var o = e.split(" ");
            t.forEach(this, function (e) {
                for (var n = e.className, i = 0; o.length > i; i++)for (; ~(r + n + r).indexOf(r + o[i] + r);)n = (r + n + r).replace(r + o[i] + r, r);
                e.className = t.string.trim(n)
            })
        } else"function" == n && t.forEach(this, function (n, r) {
            t.dom(n).removeClass(e.call(n, r, n.className))
        });
        return this
    }}), t.dom.extend({removeData: function () {
        var e = t.key, n = t.global("_maps_HTMLElementData");
        return function (r) {
            return t.forEach(this, function (n) {
                !n[e] && (n[e] = t.id())
            }), t.forEach(this, function (o) {
                var i = n[o[e]];
                "string" == typeof r ? i && delete i[r] : "array" == t.type(r) && t.forEach(r, function (e) {
                    i && delete i[e]
                })
            }), this
        }
    }()}), t.dom.extend({removeProp: function (e) {
        return e = t._util_.propFixer[e] || e, this.each(function (t, n) {
            try {
                n[e] = void 0, delete n[e]
            } catch (r) {
            }
        }), this
    }}), t._util_.smartScroll = function (e) {
        function n(e) {
            return e && 9 === e.nodeType
        }

        function r(e) {
            return"Window" == t.type(e) ? e : n(e) ? e.defaultView || e.parentWindow : !1
        }

        var o = {scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}[e], i = "scrollLeft" === e;
        return{get: function (n) {
            var i = r(n);
            return i ? o in i ? i[o] : t.browser.isStrict && i.document.documentElement[e] || i.document.body[e] : n[e]
        }, set: function (t, n) {
            if (t) {
                var o = r(t);
                o ? o.scrollTo(i ? n : this.get(t), i ? this.get(t) : n) : t[e] = n
            }
        }}
    }, t.dom.extend({scrollLeft: function () {
        var e = t._util_.smartScroll("scrollLeft");
        return function (n) {
            return n && t.check("^(?:number|string)$", "baidu.dom.scrollLeft"), 0 >= this.size() ? void 0 === n ? 0 : this : void 0 === n ? e.get(this[0]) : e.set(this[0], n) || this
        }
    }()}), t.dom.extend({scrollTop: function () {
        var e = t._util_.smartScroll("scrollTop");
        return function (n) {
            return n && t.check("^(?:number|string)$", "baidu.dom.scrollTop"), 0 >= this.size() ? void 0 === n ? 0 : this : void 0 === n ? e.get(this[0]) : e.set(this[0], n) || this
        }
    }()}), t.dom.setPixel = function (e, n, r) {
        r !== void 0 && (t.dom.g(e).style[n] = r + (isNaN(r) ? "" : "px"))
    }, t.dom.extend({show: function () {
        function e(e) {
            if (n[e])return n[e];
            var r, o, i, a = document.createElement(e);
            return document.body.appendChild(a), r = t.dom(a).getCurrentStyle("display"), document.body.removeChild(a), ("" === r || "none" === r) && (o = document.body.appendChild(document.createElement("iframe")), o.frameBorder = o.width = o.height = 0, i = (o.contentWindow || o.contentDocument).document, i.writeln("<!DOCTYPE html><html><body>"), i.close(), a = i.appendChild(i.createElement(e)), r = t.dom(a).getCurrentStyle("display"), document.body.removeChild(o), o = null), a = null, n[e] = r
        }

        var n = {};
        return function () {
            var r;
            return this.each(function (o, i) {
                i.style && (i.style.display = "", r = t.dom(i), "none" !== r.getCurrentStyle("display") && t._util_.contains(r.getDocument(), i) || (i.style.display = n[i.nodeName] || e(i.nodeName)))
            }), this
        }
    }()}), t.dom.extend({siblings: function (e) {
        var n = [];
        return t.forEach(this, function (e) {
            for (var r = [], o = [], i = e; i = i.previousSibling;)1 == i.nodeType && r.push(i);
            for (; e = e.nextSibling;)1 == e.nodeType && o.push(e);
            t.merge(n, r.reverse().concat(o))
        }), t.dom(t.dom.match(n, e))
    }}), t.dom.extend({slice: function () {
        var e = Array.prototype.slice;
        return function () {
            return t.check("number(,number)?", "baidu.dom.slice"), t.dom(e.apply(this, arguments))
        }
    }()}), t.dom.extend({text: function (e) {
        var n, r = t.dom, o = this, i = !1;
        if (0 >= this.size())switch (typeof e) {
            case"undefined":
                return void 0;
            default:
                return o
        }
        var a = function (e) {
            var t = "", n = e.nodeType;
            if (n)if (1 === n || 9 === n || 11 === n) {
                if ("string" == typeof e.textContent)return e.textContent;
                for (e = e.firstChild; e; e = e.nextSibling)t += a(e)
            } else if (3 === n || 4 === n)return e.nodeValue;
            return t
        };
        return t.forEach(o, function (t, o) {
            var s = r(t);
            if (!n)switch (typeof e) {
                case"undefined":
                    return n = a(t);
                case"number":
                    e += "";
                case"string":
                    i = !0, s.empty().append((t && t.ownerDocument || document).createTextNode(e));
                    break;
                case"function":
                    i = !0, s.text(e.call(t, o, s.text()))
            }
        }), i ? o : n
    }}), t.dom.extend({toggle: function () {
        for (var e = 0, t = this.size(); t > e; e++) {
            var n = this.eq(e);
            "none" != n.css("display") ? n.hide() : n.show()
        }
    }}), t.dom.extend({toggleClass: function (e, n) {
        var n = n === void 0 ? n : Boolean(n);
        switch (0 >= arguments.length && t.forEach(this, function (e) {
            e.className = ""
        }), typeof e) {
            case"string":
                e = e.replace(/^\s+/g, "").replace(/\s+$/g, "").replace(/\s+/g, " ");
                var r = e.split(" ");
                t.forEach(this, function (e) {
                    for (var t = e.className, o = 0; r.length > o; o++)~(" " + t + " ").indexOf(" " + r[o] + " ") && n === void 0 ? t = (" " + t + " ").replace(" " + r[o] + " ", " ") : ~(" " + t + " ").indexOf(" " + r[o] + " ") || void 0 !== n ? ~(" " + t + " ").indexOf(" " + r[o] + " ") || n !== !0 ? ~(" " + t + " ").indexOf(" " + r[o] + " ") && n === !1 && (t = t.replace(r[o], "")) : t += " " + r[o] : t += " " + r[o];
                    e.className = t.replace(/^\s+/g, "").replace(/\s+$/g, "")
                });
                break;
            case"function":
                t.forEach(this, function (r, o) {
                    t.dom(r).toggleClass(e.call(r, o, r.className), n)
                })
        }
        return this
    }}), void function (e) {
        if (!e.mousewheel) {
            var n = /firefox/i.test(navigator.userAgent), r = /msie/i.test(navigator.userAgent);
            t.each({mouseenter: "mouseover", mouseleave: "mouseout"}, function (n, r) {
                e[n] = {bindType: r, pack: function (e) {
                    var r = t.dom.contains;
                    return function (t) {
                        var o = t.relatedTarget;
                        return t.type = n, !o || o !== this && !r(this, o) ? e.apply(this, arguments) : void 0
                    }
                }}
            }), r || t.each({focusin: "focus", focusout: "blur"}, function (t, n) {
                e[t] = {bindType: n, attachElements: "textarea,select,input,button,a"}
            }), e.mousewheel = {bindType: n ? "DOMMouseScroll" : "mousewheel", pack: function (e) {
                return function (t) {
                    var r = t.originalEvent;
                    return t.type = "mousewheel", t.wheelDelta = t.wheelDelta || (n ? -40 * r.detail : r.wheelDelta) || 0, e.apply(this, arguments)
                }
            }}
        }
    }(t.event.special), void function (e) {
        var n = e.queue;
        t.dom.extend({triggerHandler: function (e, r, o) {
            return o && !o.triggerData && (o.triggerData = r), t.forEach(this, function (t) {
                n.call(t, e, void 0, o)
            }), this
        }})
    }(t._util_.eventBase), void function (e, n) {
        var r = n.special, o = e.queue, i = t.dom, a = !window.addEventListener, s = /firefox/i.test(navigator.userAgent), u = {submit: 3, focus: a ? 3 : 2, blur: a ? 3 : s ? 1 : 2}, c = function (e, t) {
            var n;
            document.createEvent ? (n = document.createEvent("HTMLEvents"), n.initEvent(e, !0, !0)) : document.createEventObject && (n = document.createEventObject(), n.type = e);
            var r = {};
            if (t)for (var o in t)try {
                n[o] = t[o]
            } catch (i) {
                n.extraData || (n.extraData = r), r[o] = t[o]
            }
            return n
        }, l = function (e, t, n) {
            return e.dispatchEvent ? e.dispatchEvent(n) : e.fireEvent ? e.fireEvent("on" + t, n) : void 0
        }, f = function (e, t, n, r, a) {
            var s, f;
            if (s = c(t, r))if (n && (s.triggerData = n), a)o.call(e, t, null, s); else {
                var d = e.window === window ? 3 : u[t];
                try {
                    (1 & d || !(t in u)) && (f = l(e, t, s))
                } catch (p) {
                    i(e).triggerHandler(t, n, s)
                }
                if (f !== !1 && 2 & d)try {
                    e[t] && e[t]()
                } catch (p) {
                }
            }
        };
        t.dom.extend({trigger: function (e, t, n) {
            var o;
            return e in r && (o = r[e]), this.each(function () {
                f(this, e, t, n, o)
            }), this
        }})
    }(t._util_.eventBase, t.event), t.dom.extend({unbind: function (e, t) {
        return this.off(e, t)
    }}), t.dom.extend({undelegate: function (e, t, n) {
        return this.off(t, e, n)
    }}), t.dom.extend({unique: function (e) {
        return t.dom(t.array(this.toArray()).unique(e))
    }}), t._util_.inArray = function (e, t, n) {
        if (!t)return-1;
        var r, o = Array.prototype.indexOf;
        if (o)return o.call(t, e, n);
        for (r = t.length, n = n ? 0 > n ? Math.max(0, r + n) : n : 0; r > n; n++)if (n in t && t[n] === e)return n;
        return-1
    }, t.dom.extend({val: function () {
        t._util_.support.dom.select.disabled = !0;
        var e = t._util_, n = "on" === e.support.dom.input.value, r = !e.support.dom.opt.disabled, o = ["radio", "checkbox"], i = {option: {get: function (e) {
            var t = e.attributes.value;
            return!t || t.specified ? e.value : e.text
        }}, select: {get: function (n) {
            for (var o, i, a = n.options, s = n.selectedIndex, u = "select-one" === n.type || 0 > s, c = u ? null : [], l = u ? s + 1 : a.length, f = 0 > s ? l : u ? s : 0; l > f; f++)if (o = a[f], !(!o.selected && f !== s || (r ? o.disabled : null !== o.getAttribute("disabled")) || o.parentNode.disabled && e.nodeName(o.parentNode, "optgroup"))) {
                if (i = t.dom(o).val(), u)return i;
                c.push(i)
            }
            return c
        }, set: function (n, r, o) {
            var i = t.makeArray(o);
            return t.dom(n).find("option").each(function (n, r) {
                r.selected = e.inArray(t.dom(this).val(), i) >= 0
            }), !i.length && (n.selectedIndex = -1), i
        }}};
        return!e.support.getSetAttribute && (i.button = e.nodeHook), n || t.forEach(o, function (e) {
            i[e] = {get: function (e) {
                return null === e.getAttribute("value") ? "on" : e.value
            }}
        }), t.forEach(o, function (n) {
            i[n] = i[n] || {}, i[n].set = function (n, r, o) {
                return"array" === t.type(o) ? n.checked = e.inArray(t.dom(n).val(), o) >= 0 : void 0
            }
        }), function (e) {
            var n, r;
            if (void 0 === e) {
                if (!(n = this[0]))return;
                return r = i[n.type] || i[n.nodeName.toLowerCase()] || {}, r.get && r.get(n, "value") || n.value
            }
            return this.each(function (n, o) {
                if (1 === o.nodeType) {
                    var a = t.dom(o), s = "function" === t.type(e) ? e.call(o, n, a.val()) : e;
                    null == s ? s = "" : "number" === t.type(s) ? s += "" : "array" === t.type(s) && (s = t.array(s).map(function (e) {
                        return null == e ? "" : e + ""
                    })), r = i[o.type] || i[o.nodeName.toLowerCase()] || {}, r.set && void 0 !== r.set(o, "value", s) || (o.value = s)
                }
            }), this
        }
    }()}), t.dom.extend({width: function (e) {
        return t._util_.access(this, "width", e, function (e, n, r) {
            var o = void 0 !== r, i = o && parseFloat(r), a = null != e && e == e.window ? "window" : 9 === e.nodeType ? "document" : !1;
            if (!(o && 0 > i || isNaN(i)))return o && /^(?:\d*\.)?\d+$/.test(r += "") && (r += "px"), a ? t._util_.getWindowOrDocumentWidthOrHeight(e, a, n) : o ? e.style.width = r : t._util_.getWidthOrHeight(e, n)
        })
    }}), void function () {
        for (var e = "blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave mousewheel change select submit keydown keypress keyup error contextmenu".split(" "), n = {}, r = function (e) {
            n[e] = function (t, n) {
                return null == n && (n = t, t = null), arguments.length > 0 ? this.on(e, null, t, n) : this.trigger(e)
            }
        }, o = 0, i = e.length; i > o; o++)r(e[o]);
        t.dom.extend(n)
    }(), t.createChain("fn", function (e) {
        return new t.fn.$Fn(~"function|string".indexOf(t.type(e)) ? e : function () {
        })
    }, function (e) {
        this.fn = e
    }), t.fn.extend({bind: function (e) {
        var n = this.fn, r = arguments.length > 1 ? Array.prototype.slice.call(arguments, 1) : null;
        return function () {
            var o = "string" === t.type(n) ? e[n] : n, i = r ? r.concat(Array.prototype.slice.call(arguments, 0)) : arguments;
            return o.apply(e || o, i)
        }
    }}), t.fx = t.fx || {}, t.lang.inherits = t.base.inherits, t.fx.Timeline = function (e) {
        t.lang.Class.call(this), this.interval = 16, this.duration = 500, this.dynamic = !0, t.object.extend(this, e)
    }, t.lang.inherits(t.fx.Timeline, t.lang.Class, "baidu.fx.Timeline").extend({launch: function () {
        var e = this;
        return e.dispatchEvent("onbeforestart"), "function" == typeof e.initialize && e.initialize(), e["btime"] = (new Date).getTime(), e["etime"] = e["btime"] + (e.dynamic ? e.duration : 0), e["pulsed"](), e
    }, "pulsed": function () {
        var e = this, t = (new Date).getTime();
        return e.percent = (t - e["btime"]) / e.duration, e.dispatchEvent("onbeforeupdate"), t >= e["etime"] ? ("function" == typeof e.render && e.render(e.transition(e.percent = 1)), "function" == typeof e.finish && e.finish(), e.dispatchEvent("onafterfinish"), e.dispose(), void 0) : ("function" == typeof e.render && e.render(e.transition(e.percent)), e.dispatchEvent("onafterupdate"), e["timer"] = setTimeout(function () {
            e["pulsed"]()
        }, e.interval), void 0)
    }, transition: function (e) {
        return e
    }, cancel: function () {
        this["timer"] && clearTimeout(this["timer"]), this["etime"] = this["btime"], "function" == typeof this.restore && this.restore(), this.dispatchEvent("oncancel"), this.dispose()
    }, end: function () {
        this["timer"] && clearTimeout(this["timer"]), this["etime"] = this["btime"], this["pulsed"]()
    }}), t.fx.create = function (e, n, r) {
        var o = new t.fx.Timeline(n);
        o.element = e, o.__type = r || o.__type, o["original"] = {};
        var i = "baidu_current_effect";
        return o.addEventListener("onbeforestart", function () {
            var e, t = this;
            t.attribName = "att_" + t.__type.replace(/\W/g, "_"), e = t.element.getAttribute(i), t.element.setAttribute(i, (e || "") + "|" + t.guid + "|", 0), t.overlapping || ((e = t.element.getAttribute(t.attribName)) && baiduInstance(e).cancel(), t.element.setAttribute(t.attribName, t.guid, 0))
        }), o["clean"] = function (e) {
            var t, n = this;
            (e = n.element) && (e.removeAttribute(n.attribName), t = e.getAttribute(i), t = t.replace("|" + n.guid + "|", ""), t ? e.setAttribute(i, t, 0) : e.removeAttribute(i))
        }, o.addEventListener("oncancel", function () {
            this["clean"](), this["restore"]()
        }), o.addEventListener("onafterfinish", function () {
            this["clean"](), this.restoreAfterFinish && this["restore"]()
        }), o.protect = function (e) {
            this["original"][e] = this.element.style[e]
        }, o["restore"] = function () {
            var e, t = this["original"], n = this.element.style;
            for (var r in t)e = t[r], void 0 !== e && (n[r] = e, !e && n.removeAttribute ? n.removeAttribute(r) : !e && n.removeProperty && n.removeProperty(r))
        }, o
    }, t.fx.current = function (e) {
        if (!(e = t.dom.g(e)))return null;
        var n, r, o = /\|([^\|]+)\|/g;
        do if (r = e.getAttribute("baidu_current_effect"))break; while ((e = e.parentNode) && 1 == e.nodeType);
        if (!r)return null;
        if (n = r.match(o)) {
            o = /\|([^\|]+)\|/;
            for (var i = 0; n.length > i; i++)o.test(n[i]), n[i] = t._global_._instances[RegExp.$1]
        }
        return n
    }, t.string.extend({formatColor: function () {
        var e = /^\#[\da-f]{6}$/i, t = /^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/i, n = {black: "#000000", silver: "#c0c0c0", gray: "#808080", white: "#ffffff", maroon: "#800000", red: "#ff0000", purple: "#800080", fuchsia: "#ff00ff", green: "#008000", lime: "#00ff00", olive: "#808000", yellow: "#ffff0", navy: "#000080", blue: "#0000ff", teal: "#008080", aqua: "#00ffff"};
        return function () {
            var r = this.valueOf();
            if (e.test(r))return r;
            if (t.test(r)) {
                for (var o, i = 1, r = "#"; 4 > i; i++)o = parseInt(RegExp["$" + i]).toString(16), r += ("00" + o).substr(o.length);
                return r
            }
            if (/^\#[\da-f]{3}$/.test(r)) {
                var a = r.charAt(1), s = r.charAt(2), u = r.charAt(3);
                return"#" + a + a + s + s + u + u
            }
            return n[r] ? n[r] : ""
        }
    }()}), t.fx.move = function (e, n) {
        if (!(e = t.dom.g(e)) || "static" == t.dom.getStyle(e, "position"))return null;
        if (n = t.object.extend({x: 0, y: 0}, n || {}), 0 == n.x && 0 == n.y)return null;
        var r = t.fx.create(e, t.object.extend({initialize: function () {
            this.protect("top"), this.protect("left"), this.originX = parseInt(t.dom.getStyle(e, "left")) || 0, this.originY = parseInt(t.dom.getStyle(e, "top")) || 0
        }, transition: function (e) {
            return 1 - Math.pow(1 - e, 2)
        }, render: function (t) {
            e.style.top = this.y * t + this.originY + "px", e.style.left = this.x * t + this.originX + "px"
        }}, n), "baidu.fx.move");
        return r.launch()
    }, t.fx.moveTo = function (e, n, r) {
        if (!(e = t.dom.g(e)) || "static" == t.dom.getStyle(e, "position") || "object" != typeof n)return null;
        var o = [n[0] || n.x || 0, n[1] || n.y || 0], i = parseInt(t.dom.getStyle(e, "left")) || 0, a = parseInt(t.dom.getStyle(e, "top")) || 0, s = t.fx.move(e, t.object.extend({x: o[0] - i, y: o[1] - a}, r || {}));
        return s
    }, t.fx.scrollBy = function (e, n, r) {
        if (!(e = t.dom.g(e)) || "object" != typeof n)return null;
        var o = {}, i = {};
        o.x = n[0] || n.x || 0, o.y = n[1] || n.y || 0;
        var a = t.fx.create(e, t.object.extend({initialize: function () {
            var t = i.sTop = e.scrollTop, n = i.sLeft = e.scrollLeft;
            i.sx = Math.min(e.scrollWidth - e.clientWidth - n, o.x), i.sy = Math.min(e.scrollHeight - e.clientHeight - t, o.y)
        }, transition: function (e) {
            return 1 - Math.pow(1 - e, 2)
        }, render: function (t) {
            e.scrollTop = i.sy * t + i.sTop, e.scrollLeft = i.sx * t + i.sLeft
        }, restore: function () {
            e.scrollTop = i.sTop, e.scrollLeft = i.sLeft
        }}, r), "baidu.fx.scroll");
        return a.launch()
    }, t.fx.scrollTo = function (e, n, r) {
        if (!(e = t.dom.g(e)) || "object" != typeof n)return null;
        var o = {};
        return o.x = (n[0] || n.x || 0) - e.scrollLeft, o.y = (n[1] || n.y || 0) - e.scrollTop, t.fx.scrollBy(e, o, r)
    }, t._util_.smartAjax = t._util_.smartAjax || function (e) {
        return function (n, r, o, i) {
            "function" === t.type(r) && (i = i || o, o = r, r = void 0), t.ajax({type: e, url: n, data: r, success: o, dataType: i})
        }
    }, t.get = t.get || t._util_.smartAjax("get"), t.global.get = function (e) {
        return t.global(e)
    }, t.global.set = function (e, n, r) {
        return t.global(e, n, !r)
    }, t.global.getZIndex = function (e, n) {
        var r = t.global.get("zIndex");
        return e && (r[e] = r[e] + (n || 1)), r[e]
    }, t.global.set("zIndex", {popup: 5e4, dialog: 1e3}, !0), t.i18n = t.i18n || {}, t.i18n.cultures = t.i18n.cultures || {}, t.i18n.cultures["en-US"] = t.object.extend(t.i18n.cultures["en-US"] || {}, {calendar: {dateFormat: "yyyy-MM-dd", titleNames: "#{MM}&nbsp;#{yyyy}", monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], dayNames: {mon: "Mon", tue: "Tue", wed: "Wed", thu: "Thu", fri: "Fri", sat: "Sat", sun: "Sun"}}, timeZone: -5, whitespace: RegExp("(^[\\s\\t\\xa0\\u3000]+)|([\\u3000\\xa0\\s\\t]+$)", "g"), number: {group: ",", groupLength: 3, decimal: ".", positive: "", negative: "-", _format: function (e, n) {
        return t.i18n.number._format(e, {group: this.group, groupLength: this.groupLength, decimal: this.decimal, symbol: n ? this.negative : this.positive})
    }}, currency: {symbol: "$"}, language: {ok: "ok", cancel: "cancel", signin: "signin", signup: "signup"}}), t.i18n.currentLocale = "en-US", t.i18n.date = t.i18n.date || {getDaysInMonth: function (e, n) {
        var r = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        return 1 == n && t.i18n.date.isLeapYear(e) ? 29 : r[n]
    }, isLeapYear: function (e) {
        return!(e % 400 && (e % 4 || !(e % 100)))
    }, toLocaleDate: function (e, n, r) {
        return this._basicDate(e, n, r || t.i18n.currentLocale)
    }, _basicDate: function (e, n, r) {
        var o, i, a = t.i18n.cultures[r || t.i18n.currentLocale].timeZone, s = 60 * a, u = e.getTime();
        return n ? (o = t.i18n.cultures[n].timeZone, i = 60 * o) : (i = -1 * e.getTimezoneOffset(), o = i / 60), new Date(o != a ? u + 6e4 * (s - i) : u)
    }, format: function (e, n) {
        var r = t.i18n.cultures[n || t.i18n.currentLocale];
        return t.date.format(t.i18n.date.toLocaleDate(e, "", n), r.calendar.dateFormat)
    }}, t.isDate = function (e) {
        return"date" == t.type(e) && "Invalid Date" != "" + e && !isNaN(e)
    }, t.isDocument = function (e) {
        return"Document" == t.type(e)
    }, t.isElement = function (e) {
        return"HTMLElement" == t.type(e)
    }, t.isNumber = function (e) {
        return"number" == t.type(e) && isFinite(e)
    }, t.isObject = function (e) {
        return"function" == typeof e || "object" == typeof e && null != e
    }, t.isPlainObject = function (e) {
        var n, r = Object.prototype.hasOwnProperty;
        if ("object" != t.type(e))return!1;
        if (e.constructor && !r.call(e, "constructor") && !r.call(e.constructor.prototype, "isPrototypeOf"))return!1;
        for (n in e)break;
        return e.item && "number" == typeof e.length ? !1 : void 0 === n || r.call(e, n)
    }, t.isWindow = function (e) {
        return"Window" == t.type(e)
    }, t.json = t.json || {}, t.json.parse = function (e) {
        return Function("return (" + e + ")")()
    }, t.json.stringify = function () {
        function e(e) {
            return/["\\\x00-\x1f]/.test(e) && (e = e.replace(/["\\\x00-\x1f]/g, function (e) {
                var t = i[e];
                return t ? t : (t = e.charCodeAt(), "\\u00" + Math.floor(t / 16).toString(16) + (t % 16).toString(16))
            })), '"' + e + '"'
        }

        function n(e) {
            var n, r, o, i = ["["], a = e.length;
            for (r = 0; a > r; r++)switch (o = e[r], typeof o) {
                case"undefined":
                case"function":
                case"unknown":
                    break;
                default:
                    n && i.push(","), i.push(t.json.stringify(o)), n = 1
            }
            return i.push("]"), i.join("")
        }

        function r(e) {
            return 10 > e ? "0" + e : e
        }

        function o(e) {
            return'"' + e.getFullYear() + "-" + r(e.getMonth() + 1) + "-" + r(e.getDate()) + "T" + r(e.getHours()) + ":" + r(e.getMinutes()) + ":" + r(e.getSeconds()) + '"'
        }

        var i = {"\b": "\\b", "	": "\\t", "\n": "\\n", "\f": "\\f", "\r": "\\r", '"': '\\"', "\\": "\\\\"};
        return function (r) {
            switch (typeof r) {
                case"undefined":
                    return"undefined";
                case"number":
                    return isFinite(r) ? r + "" : "null";
                case"string":
                    return e(r);
                case"boolean":
                    return r + "";
                default:
                    if (null === r)return"null";
                    if ("array" === t.type(r))return n(r);
                    if ("date" === t.type(r))return o(r);
                    var i, a, s = ["{"], u = t.json.stringify;
                    for (var c in r)if (Object.prototype.hasOwnProperty.call(r, c))switch (a = r[c], typeof a) {
                        case"undefined":
                        case"unknown":
                        case"function":
                            break;
                        default:
                            i && s.push(","), i = 1, s.push(u(c) + ":" + u(a))
                    }
                    return s.push("}"), s.join("")
            }
        }
    }(), t.lang.createClass = t.createClass, t.lang.guid = function () {
        return t.id()
    }, t.lang.isArray = t.isArray, t.lang.isDate = t.isDate, t.lang.isElement = t.isElement, t.lang.isObject = t.isObject, t.lang.isString = t.isString, t.lang.register = t.base.register, t.lang.toArray = function (e) {
        if (null === e || void 0 === e)return[];
        if (t.lang.isArray(e))return e;
        if ("number" != typeof e.length || "string" == typeof e || t.lang.isFunction(e))return[e];
        if (e.item) {
            for (var n = e.length, r = Array(n); n--;)r[n] = e[n];
            return r
        }
        return[].slice.call(e)
    }, t.number.extend({comma: function (e) {
        var t = this;
        return(!e || 1 > e) && (e = 3), t = (t + "").split("."), t[0] = t[0].replace(RegExp("(\\d)(?=(\\d{" + e + "})+$)", "ig"), "$1,"), t.join(".")
    }}), t.number.randomInt = function (e, t) {
        return Math.floor(Math.random() * (t - e + 1) + e)
    }, t.object.clone = function (e) {
        var n, r, o = e;
        if (!e || e instanceof Number || e instanceof String || e instanceof Boolean)return o;
        if (t.lang.isArray(e)) {
            o = [];
            var i = 0;
            for (n = 0, r = e.length; r > n; n++)o[i++] = t.object.clone(e[n])
        } else if (t.object.isPlain(e)) {
            o = {};
            for (n in e)e.hasOwnProperty(n) && (o[n] = t.object.clone(e[n]))
        }
        return o
    }, t.object.each = function (e, t) {
        var n, r, o;
        if ("function" == typeof t)for (r in e)if (e.hasOwnProperty(r) && (o = e[r], n = t.call(e, o, r), n === !1))break;
        return e
    }, t.object.isEmpty = function (e) {
        var t = !0;
        if ("[object Array]" === Object.prototype.toString.call(e))t = !e.length; else {
            e = Object(e);
            for (var n in e)return!1
        }
        return t
    }, t.object.keys = function (e) {
        var t, n = [], r = 0;
        for (t in e)e.hasOwnProperty(t) && (n[r++] = t);
        return n
    }, t.object.map = function (e, t) {
        var n = {};
        for (var r in e)e.hasOwnProperty(r) && (n[r] = t(e[r], r));
        return n
    }, t.object.merge = function () {
        function e(e) {
            return t.lang.isObject(e) && !t.lang.isFunction(e)
        }

        function n(n, r, o, i, a) {
            r.hasOwnProperty(o) && (a && e(n[o]) ? t.object.merge(n[o], r[o], {overwrite: i, recursive: a}) : !i && o in n || (n[o] = r[o]))
        }

        return function (e, t, r) {
            var o, i = 0, a = r || {}, s = a.overwrite, u = a.whiteList, c = a.recursive;
            if (u && u.length)for (o = u.length; o > i; ++i)n(e, t, u[i], s, c); else for (i in t)n(e, t, i, s, c);
            return e
        }
    }(), t.object.values = function (e) {
        var t, n = [], r = 0;
        for (t in e)e.hasOwnProperty(t) && (n[r++] = e[t]);
        return n
    }, t.page.getHeight = function () {
        var e = document, t = e.body, n = e.documentElement, r = "BackCompat" == e.compatMode ? t : e.documentElement;
        return Math.max(n.scrollHeight, t.scrollHeight, r.clientHeight)
    }, t.page.getViewHeight = function () {
        var e = document, n = t.browser.ie || 1, r = "BackCompat" === e.compatMode && 9 > n ? e.body : e.documentElement;
        return r.clientHeight
    }, t.page.getViewWidth = function () {
        var e = document, t = "BackCompat" == e.compatMode ? e.body : e.documentElement;
        return t.clientWidth
    }, t.page.getWidth = function () {
        var e = document, t = e.body, n = e.documentElement, r = "BackCompat" == e.compatMode ? t : e.documentElement;
        return Math.max(n.scrollWidth, t.scrollWidth, r.clientWidth)
    }, t.platform = t.platform || function () {
        var e = navigator.userAgent, n = function () {
        };
        return t.forEach("Android iPad iPhone Linux Macintosh Windows X11".split(" "), function (r) {
            var o = r.charAt(0).toUpperCase() + r.toLowerCase().substr(1);
            t["is" + o] = n["is" + o] = !!~e.indexOf(r)
        }), n
    }(), t.post = t.post || t._util_.smartAjax("post"), t.setBack = function (e, t) {
        return e._back_ = t, e.getBack = function () {
            return this._back_
        }, e
    }, t.createChain("sio", function (e) {
        switch (typeof e) {
            case"string":
                return new t.sio.$Sio(e)
        }
    }, function (e) {
        this.url = e
    }), t.sio._createScriptTag = function (e, t, n) {
        e.setAttribute("type", "text/javascript"), n && e.setAttribute("charset", n), e.setAttribute("src", t), document.getElementsByTagName("head")[0].appendChild(e)
    }, t.sio._removeScriptTag = function (e) {
        if (e.clearAttributes)e.clearAttributes(); else for (var t in e)e.hasOwnProperty(t) && delete e[t];
        e && e.parentNode && e.parentNode.removeChild(e), e = null
    }, t.sio.extend({callByBrowser: function (e, n) {
        var r, o = this.url, i = document.createElement("SCRIPT"), a = 0, s = n || {}, u = s.charset, c = e || function () {
        }, l = s.timeOut || 0;
        i.onload = i.onreadystatechange = function () {
            if (!a) {
                var e = i.readyState;
                if (e === void 0 || "loaded" == e || "complete" == e) {
                    a = 1;
                    try {
                        c(), clearTimeout(r)
                    } finally {
                        i.onload = i.onreadystatechange = null, t.sio._removeScriptTag(i)
                    }
                }
            }
        }, l && (r = setTimeout(function () {
            i.onload = i.onreadystatechange = null, t.sio._removeScriptTag(i), s.onfailure && s.onfailure()
        }, l)), t.sio._createScriptTag(i, o, u)
    }}), t.sio.extend({callByServer: function (e, n) {
        function r(n) {
            return function () {
                try {
                    n ? l.onfailure && l.onfailure() : (e.apply(window, arguments), clearTimeout(i)), window[o] = null, delete window[o]
                } catch (r) {
                } finally {
                    t.sio._removeScriptTag(u)
                }
            }
        }

        var o, i, a, s = this.url, u = document.createElement("SCRIPT"), c = "bd__cbs__", l = n || {}, f = l.charset, d = l.queryField || "callback", p = l.timeOut || 0, h = RegExp("(\\?|&)" + d + "=([^&]*)");
        t.lang.isFunction(e) ? (o = c + Math.floor(2147483648 * Math.random()).toString(36), window[o] = r(0)) : t.lang.isString(e) ? o = e : (a = h.exec(s)) && (o = a[2]), p && (i = setTimeout(r(1), p)), s = s.replace(h, "$1" + d + "=" + o), 0 > s.search(h) && (s += (0 > s.indexOf("?") ? "?" : "&") + d + "=" + o), t.sio._createScriptTag(u, s, f)
    }}), t.sio.extend({log: function () {
        var e = this.url, t = new Image, n = "tangram_sio_log_" + Math.floor(2147483648 * Math.random()).toString(36);
        window[n] = t, t.onload = t.onerror = t.onabort = function () {
            t.onload = t.onerror = t.onabort = null, window[n] = null, t = null
        }, t.src = e
    }}), t.string.extend({decodeHTML: function () {
        var e = this.replace(/&quot;/g, '"').replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&amp;/g, "&");
        return e.replace(/&#([\d]+);/g, function (e, t) {
            return String.fromCharCode(parseInt(t, 10))
        })
    }}), t.string.extend({encodeHTML: function () {
        return this.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;")
    }}), t.string.extend({format: function (e) {
        var t = this.valueOf(), n = Array.prototype.slice.call(arguments, 0), r = Object.prototype.toString;
        return n.length ? (n = 1 == n.length ? null !== e && /\[object Array\]|\[object Object\]/.test(r.call(e)) ? e : n : n, t.replace(/#\{(.+?)\}/g, function (e, t) {
            var o = n[t];
            return"[object Function]" == r.call(o) && (o = o(t)), o === void 0 ? "" : o
        })) : t
    }}), t.string.extend({getByteLength: function () {
        return this.replace(/[^\x00-\xff]/g, "ci").length
    }}), t.string.extend({stripTags: function () {
        return(this || "").replace(/<[^>]+>/g, "")
    }}), t.string.extend({subByte: function (e, n) {
        if (t.check("number(,string)?$", "baidu.string.subByte"), 0 > e || e >= this.getByteLength())return this.valueOf();
        var r = this.substr(0, e).replace(/([^\x00-\xff])/g, "$1 ").substr(0, e).replace(/[^\x00-\xff]$/, "").replace(/([^\x00-\xff]) /g, "$1");
        return r + (n || "")
    }}), t.string.extend({toHalfWidth: function () {
        return this.replace(/[\uFF01-\uFF5E]/g,function (e) {
            return String.fromCharCode(e.charCodeAt(0) - 65248)
        }).replace(/\u3000/g, " ")
    }}), t.string.extend({wbr: function () {
        return this.replace(/(?:<[^>]+>)|(?:&#?[0-9a-z]{2,6};)|(.{1})/gi, "$&<wbr>").replace(/><wbr>/g, ">")
    }}), t.swf = t.swf || {}, t.swf.version = function () {
        var e = navigator;
        if (e.plugins && e.mimeTypes.length) {
            var t = e.plugins["Shockwave Flash"];
            if (t && t.description)return t.description.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s)+r/, ".") + ".0"
        } else if (window.ActiveXObject && !window.opera)for (var n = 12; n >= 2; n--)try {
            var r = new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + n);
            if (r) {
                var o = r.GetVariable("$version");
                return o.replace(/WIN/g, "").replace(/,/g, ".")
            }
        } catch (i) {
        }
    }(), t.swf.createHTML = function (e) {
        e = e || {};
        var n, r, o, i, a, s, u = t.swf.version, c = e.ver || "6.0.0", l = {}, f = t.string.encodeHTML;
        for (i in e)l[i] = e[i];
        if (e = l, !u)return"";
        for (u = u.split("."), c = c.split("."), o = 0; 3 > o && (n = parseInt(u[o], 10), r = parseInt(c[o], 10), !(n > r)); o++)if (r > n)return"";
        var d = e.vars, p = ["classid", "codebase", "id", "width", "height", "align"];
        if (e.align = e.align || "middle", e.classid = "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000", e.codebase = "http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0", e.movie = e.url || "", delete e.vars, delete e.url, "string" == typeof d)e.flashvars = d; else {
            var h = [];
            for (i in d)s = d[i], h.push(i + "=" + encodeURIComponent(s));
            e.flashvars = h.join("&")
        }
        var m = ["<object "];
        for (o = 0, a = p.length; a > o; o++)s = p[o], m.push(" ", s, '="', f(e[s]), '"');
        m.push(">");
        var g = {wmode: 1, scale: 1, quality: 1, play: 1, loop: 1, menu: 1, salign: 1, bgcolor: 1, base: 1, allowscriptaccess: 1, allownetworking: 1, allowfullscreen: 1, seamlesstabbing: 1, devicefont: 1, swliveconnect: 1, flashvars: 1, movie: 1};
        for (i in e)s = e[i], i = i.toLowerCase(), g[i] && (s || s === !1 || 0 === s) && m.push('<param name="' + i + '" value="' + f(s) + '" />');
        e.src = e.movie, e.name = e.id, delete e.id, delete e.movie, delete e.classid, delete e.codebase, e.type = "application/x-shockwave-flash", e.pluginspage = "http://www.macromedia.com/go/getflashplayer", m.push("<embed");
        var y;
        for (i in e)if (s = e[i], s || s === !1 || 0 === s) {
            if (RegExp("^salign$", "i").test(i)) {
                y = s;
                continue
            }
            m.push(" ", i, '="', f(s), '"')
        }
        return y && m.push(' salign="', f(y), '"'), m.push("></embed></object>"), m.join("")
    }, t.swf.create = function (e, n) {
        e = e || {};
        var r = t.swf.createHTML(e) || e.errorMessage || "";
        n && "string" == typeof n && (n = document.getElementById(n)), t.dom.insertHTML(n || document.body, "beforeEnd", r)
    }, t.swf.getMovie = function (e) {
        var n, r = document[e];
        return 9 == t.browser.ie ? r && r.length ? 1 == (n = t.array.remove(t.lang.toArray(r), function (e) {
            return"embed" != e.tagName.toLowerCase()
        })).length ? n[0] : n : r : r || window[e]
    }, t.swf.Proxy = function (e, n, r) {
        var o, i = this, a = this._flash = t.swf.getMovie(e);
        return n ? (o = setInterval(function () {
            try {
                a[n] && (i._initialized = !0, clearInterval(o), r && r())
            } catch (e) {
            }
        }, 100), void 0) : this
    }, t.swf.Proxy.prototype.getFlash = function () {
        return this._flash
    }, t.swf.Proxy.prototype.isReady = function () {
        return!!this._initialized
    }, t.swf.Proxy.prototype.call = function (e) {
        try {
            var t = this.getFlash(), n = Array.prototype.slice.call(arguments);
            n.shift(), t[e] && t[e].apply(t, n)
        } catch (r) {
        }
    }, t.array = t.array || {}, t.dom = t.dom || {}, t.addClass = t.dom.addClass || {}, t.g = t.G = t.dom.g || {}, t.getAttr = t.dom.getAttr || {}, t.getStyle = t.dom.getStyle || {}, t.hide = t.dom.hide || {}, t.insertHTML = t.dom.insertHTML || {}, t.q = t.Q = t.dom.q || {}, t.removeClass = t.dom.removeClass || {}, t.setAttr = t.dom.setAttr || {}, t.setAttrs = t.dom.setAttrs || {}, t.dom.setOuterHeight = t.dom.setBorderBoxHeight || {}, t.dom.setOuterWidth = t.dom.setBorderBoxWidth || {}, t.setStyle = t.dom.setStyle || {}, t.setStyles = t.dom.setStyles || {}, t.show = t.dom.show || {}, t.e = t.element = t.element || {}, t.event = t.event || {}, t.on = t.event.on || {}, t.un = t.event.un || {}, t.lang = t.lang || {}, t.inherits = t.lang.inherits || {}, t.object = t.object || {}, t.string = t.string || {}, t.decodeHTML = t.string.decodeHTML || {}, t.encodeHTML = t.string.encodeHTML || {}, t.format = t.string.format || {}, t.trim = t.string.trim || {}, t
}();