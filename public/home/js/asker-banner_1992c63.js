define("question:widget/asker-banner/asker-banner.js", function (n, e, t) {
    function i(n) {
        for (var e = d("#num-wrap"), t = String(n).split("").reverse(), i = '<b class="num num<#=num#>"></b>',
                 o = t.length, a = ""; o--;)a += f(i, {num: t[o]});
        e.prepend(a)
    }

    function o(n) {
        n %= 1e9, q = n + h, x = n, u(), a()
    }

    function a() {
        j = 0;
        var n = setInterval(function () {
            return j + 2 >= w / b ? (clearInterval(n), void r()) : (j++, q = Math.floor(q + (x - q) * j / (w / b)), void u())
        }, b)
    }

    function r() {
        d.get("/question/api/getpushnum?qid=" + c + "&ctime=" + l, function (n) {
            n && 0 === n.errno && (q = x, x = n.data.qPushNum % 1e9, u(), a())
        }, "json")
    }

    function u() {
        var n = (q + "").split("");
        d.each(d("#people-num-wrap span"), function (e, t) {
            s(d(t), parseInt(n[e], 10))
        })
    }

    function s(n, e) {
        var t = parseInt(n.data("num"), 10) || 0, i = t * v, o = e >= t ? e * v : (e + 10) * v, a = (o - i) / (m / g),
            r = setInterval(function () {
                return i + a >= o ? (i = o, n.css("background-position", "0px -" + (i + 0) + "px").data("num", e), void clearInterval(r)) : (i += a, void n.css("background-position", "0px -" + (i + 0) + "px"))
            }, g)
    }

    function p(n) {
        var e = d("#people-num-wrap"), t = '<span class="people-num"></span>', i = "",
            a = (n.finishCount % 1e9 + h + "").split(""), r = a.length;
        for (c = n.qid, l = n.ctime; r--;)i += f(t, {});
        e.append(i), e.find("span").each(function (n, e) {
            d(e).css("background-position", "0px -" + (0 + a[n] * v) + "px")
        }), d(window).on("load", function () {
            o(n.finishCount)
        })
    }

    var c, l, d = n("common:widget/lib/jquery/jquery.js"), f = n("common:widget/js/util/template/template.js"),
        m = 1500, v = 22, g = 16, h = -30, b = 5e3, w = 3e4, j = 0, q = 0, x = 0;
    t.exports = {init: p, initZhima: i}
});