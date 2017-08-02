define("question:widget/answer-deal/asker/asker.js", function (e, t, i) {
    function o(e) {
        m.fire("login.check", {
            isLogin: function () {
                var t = ['<div class="dialog-adopt">', '<p class="f-yahei adopt-title mb-10 f-gray">\u91c7\u7eb3\u6210\u529f!</p>', '<p class="f-yahei adopt-title-more">\u611f\u8c22\u60a8\u91c7\u7eb3\u6ee1\u610f\u56de\u7b54', "0" == F.context("page").isCompanyIask && "1" != F.context("isPsAsk") ? ',\u5956\u52b1\u8d22\u5bcc\u503c<span class="i-wealth-big"></span><span class="f-red f-12">+5<span/>' : "", "</p>", "</div>"].join("");
                new u({
                    params: e, syncId: "adopt", hasJump: !1, beforeJump: function () {
                        var e = new f({
                            content: t, width: 458, className: "ui-question-widget", close: function () {
                                window.location.reload(!0)
                            }, autoDispose: !0
                        });
                        setTimeout(function () {
                            e.close(), window.location.reload(!0)
                        }, 3e3)
                    }
                })
            }
        })
    }

    function n(e) {
        var t = F.context("page") || {}, i = {cm: 100008, qid: t.qid, reward: 0, comment: "\u8c22\u8c22!", aid: e};
        l("#adopt-ask-" + e).click(function (e) {
            try {
                e.preventDefault(), o(i), h.send({type: 2014, area: "asker-adopt", action: "click"})
            } catch (e) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: e.message,
                    path: "question:widget/answer-deal/asker/asker.js",
                    method: "",
                    ln: 117
                })
            }
        }).mouseover(function () {
            this.tip || (this.tip = new g({
                tooltipClass: "adopt-ask-tip",
                direction: "bottom",
                content: "\u6bcf\u4e2a\u95ee\u9898\u53ea\u80fd\u91c7\u7eb3\u4e00\u4e2a\u6ee1\u610f\u56de\u7b54\u54e6\uff01",
                target: this,
                position: {my: "right-10 top", at: "left+157 top-40"}
            })), this.tip.show(), l(".tip-arrow-right", this.tip.getTipContainer()).css("top", "9px")
        }).mouseout(function () {
            this.tip.hide()
        })
    }

    function a(e) {
        F.context("page") || {};
        l("#adopt-del-reply-" + e).click(function (t) {
            try {
                t.preventDefault();
                var i = ['<div class="pl-20">', "<p>\u786e\u5b9a\u5220\u9664\u5417\uff1f<p/>", "</div>"].join(""),
                    o = f.confirm(i, {
                        title: "\u77e5\u9053\u63d0\u793a",
                        width: 300,
                        height: 140,
                        autoDispose: !0,
                        onaccept: function () {
                            o.close();
                            var t = {cm: 100016, qid: F.context("page").qid, aid: e, rid: e};
                            new u({
                                url: "/submit/ajax", params: t, beforeJump: function () {
                                    var e = new f({
                                        width: 350,
                                        height: 160,
                                        title: "\u77e5\u9053\u63d0\u793a",
                                        content: '<div class="mt-20">\u5220\u9664\u56de\u7b54\u6210\u529f\u5566~~</div>',
                                        autoDispose: !0,
                                        close: function () {
                                            window.location.reload(!0)
                                        }
                                    });
                                    setTimeout(function () {
                                        e.close()
                                    }, 1e3)
                                }, errorDeal: function () {
                                    f.alert("\u5220\u9664\u56de\u7b54\u5931\u8d25\u4e86: (")
                                }
                            })
                        }
                    });
                h.send({type: 2014, area: "asker-del-auto", action: "click"})
            } catch (t) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: t.message,
                    path: "question:widget/answer-deal/asker/asker.js",
                    method: "",
                    ln: 190
                })
            }
        }).mouseover(function () {
            this.tip || (this.tip = new g({
                tooltipClass: "tip-red",
                direction: "right",
                content: "\u56de\u7b54\u5982\u679c\u6709\u8bef\uff0c\u60a8\u53ef\u5220\u9664\u672c\u56de\u7b54\uff0c\u77e5\u9053\u4f1a\u63a8\u9001\u672c\u95ee\u9898\u7ed9\u5176\u4ed6\u4eba\u89e3\u7b54\u3002",
                target: this,
                position: {my: "right-10 top", at: "left top"}
            })), this.tip.show(), l(".tip-arrow-right", this.tip.getTipContainer()).css("top", "9px")
        }).mouseout(function () {
            this.tip.hide()
        })
    }

    function s(e) {
        var t = l(l.isString(e.controller) ? "#" + e.controller : e.controller), i = null;
        t.click(function (t) {
            try {
                if (!i && (i = new p(e.editorConfig), l(i.submitBtn).click(function (t) {
                        try {
                            m.fire("login.check", {
                                isLogin: function () {
                                    c(i, e.id)
                                }
                            }), t.preventDefault()
                        } catch (t) {
                            "undefined" != typeof alog && alog("exception.fire", "catch", {
                                msg: t.message,
                                path: "question:widget/answer-deal/asker/asker.js",
                                method: "",
                                ln: 227
                            })
                        }
                    }), h.send({
                        module: "question",
                        page: "answer-deal",
                        action: "click",
                        area: "pump-ask"
                    }), "modifyask" == i.type)) {
                    var o = F.context("answers")[e.id].raid, n = F.context("editreplyask-" + o),
                        a = l("#replyask-content-" + o).find(".answer-oldmap");
                    a.length && (n.con += '<p><iframe data-type="map" map="' + a[0].src + '" frameborder="0" class="answer-map" src="' + a[0].src + '" ></iframe></p>'), n && n.con && i.setContent(n.con, n.rich)
                }
                l(this).hasClass("cancel-deal") ? (l(this).removeClass("cancel-deal").html("" + e.btnText[0]), i.collapseEditor(290)) : (l(this).addClass("cancel-deal").html("" + e.btnText[1]), i.expandEditor(290), m.fire("comment.close", e.id)), t.preventDefault()
            } catch (t) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: t.message,
                    path: "question:widget/answer-deal/asker/asker.js",
                    method: "",
                    ln: 264
                })
            }
        })
    }

    function c(e, t) {
        if (e.checkEditor()) {
            var i = F.context("page") || {}, o = (F.context("answers") || {})[t] || {},
                n = {cm: 100400, qid: i.qid, rid: t, raid: o.raid};
            "modifyask" == e.type && (n.cm = 100401), l.object.extend(n, e.editorSubmit()), new u({
                params: n,
                syncId: e.type,
                beforeJump: function (e, t) {
                    var i = "100400" == t.cm ? ['<div class="replyask-add-tip">', t.check ? "\u8ffd\u95ee\u6b63\u5728\u63d0\u4ea4\uff0c\u8bf7\u8010\u5fc3\u7b49\u5f85\u51e0\u5206\u949f" : "\u8ffd\u95ee\u6210\u529f\uff01\u8bf7\u7b49\u5f85\u6b64\u7f51\u53cb\u7684\u56de\u7b54", "</div>"] : ['<div class="replyask-edit-tip">', t.check ? "\u4fee\u6539\u6b63\u5728\u63d0\u4ea4\uff0c\u8bf7\u8010\u5fc3\u7b49\u5019\u51e0\u5206\u949f" : "\u4fee\u6539\u6210\u529f\uff01\u8bf7\u7b49\u5f85\u6b64\u7f51\u53cb\u7684\u56de\u7b54", "</div>"],
                        o = new f({
                            title: "\u77e5\u9053\u63d0\u793a",
                            content: i.join(""),
                            width: 430,
                            className: "ui-question-widget",
                            open: function () {
                                setTimeout(function () {
                                    o.close()
                                }, 3e3)
                            },
                            close: function () {
                                window.location.reload(!0)
                            }
                        })
                },
                authcode: e.authcode || null
            })
        }
    }

    function r(e) {
        var t = (F.context("answers") || {})[e] || {}, i = t.replyAskNum || 0,
            o = '\u63d0\u793a\uff1a\u60a8\u7684\u8ffd\u95ee\u5df2\u7ecf\u8d85\u8fc7#{0}\u6761\uff0c\u7ee7\u7eed\u8ffd\u95ee\u6bcf\u6b21\u5c06\u6d88\u8017<span class="bold red">#{1}</span>\u4e2a\u8d22\u5bcc\u503c&nbsp;&nbsp;<a href="http://baidu.com/search/zhidao_help.html#\u5982\u4f55\u83b7\u5f97\u79ef\u5206" target="_blank">\u4e86\u89e3\u8be6\u60c5</a>',
            n = {addons: {}};
        i > 2 && 6 > i && (n.addons.text = l.string(o).format([3, 5])), i > 4 && 7 > i && (n.addons.text = l.string(o).format([5, 10])), 3 > i && (n.addons.text = '\u63d0\u793a\uff1a\u5bf9\u540c\u4e00\u56de\u7b54\u8005\u8ffd\u95ee\u8d85\u8fc73\u6761\u540e\u6bcf\u6b21\u5c06\u6d88\u8017<span class="bold red">5</span>\u4e2a\u8d22\u5bcc\u503c&nbsp;&nbsp;<a href="http://baidu.com/search/zhidao_help.html#\u5982\u4f55\u83b7\u5f97\u79ef\u5206" target="_blank">\u4e86\u89e3\u8be6\u60c5</a>');
        F.context("user").isAsker ? '<i class="i-icon-ask"></i>' : "";
        l("#pump-ask-" + e).get(0) && s({
            id: e,
            controller: "pump-ask-" + e,
            btnText: ["\u8ffd\u95ee", "\u53d6\u6d88"],
            editorConfig: {id: "editor-" + e, type: "appendask", conf: n}
        }), l("#modify-ask-" + e).get(0) && s({
            id: e,
            controller: "modify-ask-" + e,
            btnText: ["\u4fee\u6539", "\u53d6\u6d88"],
            editorConfig: {id: "editor-" + e, type: "modifyask", conf: n}
        })
    }

    function d(e) {
        l("#cancel-recommend-" + e).click(function (t) {
            try {
                var i = {cm: 100127, qid: F.context("page").qid, rid: e};
                new u({
                    params: i, autoRefresh: !0, beforeJump: function () {
                        var e = new f({
                            title: "\u77e5\u9053\u63d0\u793a",
                            content: "\u53d6\u6d88\u63a8\u8350\u6210\u529f",
                            width: 270,
                            height: 150,
                            open: function () {
                                setTimeout(function () {
                                    e.close()
                                }, 1500)
                            },
                            close: function () {
                                window.location.reload(!0)
                            }
                        })
                    }
                }), t.preventDefault()
            } catch (t) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: t.message,
                    path: "question:widget/answer-deal/asker/asker.js",
                    method: "",
                    ln: 396
                })
            }
        })
    }

    var l = e("common:widget/js/util/tangram/tangram.js"), p = e("question:widget/js/editor/editor.js"),
        m = (e("common:widget/js/logic/mini-editor/mini-editor.js"), e("common:widget/js/util/event/event.js")),
        u = e("common:widget/js/logic/submit/submit.js"), f = e("common:widget/js/ui/dialog/dialog.js"),
        h = e("common:widget/js/util/log/log.js"), g = e("common:widget/js/ui/tip/tip.js"), w = null;
    m.on("replyask.close", function (e, t) {
        l("#pump-ask-" + t + ",#modify-ask-" + t).filter(".cancel-deal").click()
    }), m.on("expand", function () {
        w && w.setSize({height: 342})
    }), m.on("shrink", function () {
        w && w.setSize({height: 292})
    }), i.exports.init = function (e) {
        try {
            r(e), n(e), a(e), d(e), l(".answer").mouseenter(function () {
                l(".cancel-recommend-btn", this).show()
            }).mouseleave(function () {
                l(".cancel-recommend-btn", this).hide()
            })
        } catch (t) {
            "undefined" != typeof alog && alog("exception.fire", "catch", {
                msg: t.message,
                path: "question:widget/answer-deal/asker/asker.js",
                method: "",
                ln: 421
            })
        }
    }
});
;define("question:widget/ask/asker/asker.js", function (e, t, n) {
    function o() {
        var e = l("#q-operation .ope-action-show"), t = l("#ope-action .asker-op-buttons"), n = l(".asker-banner-tips");
        l("#ope-action a").each(function (o, a) {
            l(a).click(function (a) {
                try {
                    if (a.preventDefault(), u.send({
                            module: "question",
                            page: "ask",
                            action: "click",
                            area: "ope_action_" + o
                        }), o === g)return t.eq(o).find("i").hasClass("i-incline-down") ? t.eq(o).find("i").removeClass("i-incline-down").addClass("i-incline-up") : t.eq(o).find("i").removeClass("i-incline-up").addClass("i-incline-down"), e.eq(o).toggle(), n.toggle(), !1;
                    -1 != g && (e.eq(g).hide(), t.eq(g).find("i").removeClass("i-incline-up").addClass("i-incline-down")), n.hide(), e.eq(o).show(), t.eq(o).find("i").removeClass("i-incline-down").addClass("i-incline-up"), 0 == o && s(), g = o, o > 0 && m.fire("editor.default")
                } catch (a) {
                    "undefined" != typeof alog && alog("exception.fire", "catch", {
                        msg: a.message,
                        path: "question:widget/ask/asker/asker.js",
                        method: "",
                        ln: 56
                    })
                }
            })
        })
    }

    function s() {
        var e = l("#ask-editor").empty();
        if (0 != e.size()) {
            var t = new h({type: "moreanswer", id: "ask-editor"}), n = F.context("page");
            t.setContent(n.supply || ""), l(t.submitBtn).click(function (e) {
                try {
                    e.preventDefault();
                    var n = F.context("page") || {}, o = {cm: 100002, qid: n.qid, rich: 1};
                    t.checkEditor() && m.fire("login.check", {
                        isLogin: function () {
                            l.object.extend(o, {supply: t.editorSubmit().co}), t.authcode && t.authcode.submitParam(o), u.send({
                                type: 2038,
                                page: "question",
                                action: "moreanswer"
                            }), new d({
                                params: o, hasJump: !1, syncId: t.type, beforeJump: function () {
                                    l.cookie.set("IK_SUCCESS_JUMP", "100002", {
                                        path: "/",
                                        expires: 288e5
                                    }), setTimeout(function () {
                                        window.location.reload(!0)
                                    }, 500), l.cookie.set("IK_QB_ALTER", 0)
                                }, authcode: t.authcode || null
                            })
                        }
                    })
                } catch (e) {
                    "undefined" != typeof alog && alog("exception.fire", "catch", {
                        msg: e.message,
                        path: "question:widget/ask/asker/asker.js",
                        method: "",
                        ln: 119
                    })
                }
            })
        }
    }

    function a(e) {
        e.preventDefault(), l(this).parents(".ope-action-show").hide();
        l("#ope-action li.current").eq(0).removeClass("current");
        g = -1
    }

    function i() {
        l(".wgt-enhance-score").on("click", ".enhance-score", function (e) {
            try {
                e.preventDefault(), l(this).hasClass("active-enhance-score") ? l(this).removeClass("active-enhance-score") : (l(".wgt-enhance-score .enhance-score").removeClass("active-enhance-score"), l(this).addClass("active-enhance-score"))
            } catch (e) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: e.message,
                    path: "question:widget/ask/asker/asker.js",
                    method: "",
                    ln: 139
                })
            }
        }).on("focus", ".other-score", function () {
            l(".enhance-other-score").addClass("active")
        }).on("blur", ".other-score", function () {
            l(".enhance-other-score").removeClass("active"), l(".enhance-other-score").removeClass("error")
        }).on("keyup", ".other-score", function () {
            var e = l(this).val(), t = parseInt(F.context("user").wealth), n = parseInt(F.context("page").giveScore);
            /^\d+$/.test(e) ? t > 255 && e > 255 ? (l(".enhance-other-score").addClass("error"), l(".enhance-other-tips").html("\u6700\u591a255\u8d22\u5bcc\u503c").show()) : 255 > t && e > t ? (l(".enhance-other-score").addClass("error"), l(".enhance-other-tips").html("\u6700\u591a" + F.context("user").wealth + "\u8d22\u5bcc\u503c").show()) : 0 == n && 5 > e ? (l(".enhance-other-score").addClass("error"), l(".enhance-other-tips").html("\u6700\u5c115\u8d22\u5bcc\u503c").show()) : 5 > e - n ? (l(".enhance-other-score").addClass("error"), l(".enhance-other-tips").html("\u6700\u5c11" + (n + 5) + "\u8d22\u5bcc\u503c").show()) : (l(".enhance-other-score").removeClass("error").addClass("active"), l(".enhance-other-tips").hide()) : (l(".enhance-other-score").addClass("error"), l(".enhance-other-tips").html("\u8bf7\u8f93\u5165\u6574\u6570\u8d22\u5bcc\u503c\uff01").show()), l(".wgt-enhance-score .enhance-score").removeClass("active-enhance-score")
        }), l("#enhance-submit").click(function (e) {
            try {
                e.preventDefault();
                var t;
                t = l(".wgt-enhance-score .active-enhance-score").size() > 0 ? l(".wgt-enhance-score .active-enhance-score").data("score") : l(".wgt-enhance-score .other-score").val() - F.context("page").giveScore, m.fire("login.check", {
                    isLogin: function () {
                        var e = {cm: 100006, qid: F.context("page").qid, wealth: t};
                        new d({
                            params: e, beforeJump: function () {
                                var e = new p({
                                    width: 350,
                                    height: 85,
                                    className: "ui-question-widget",
                                    content: "\u6210\u529f\u63d0\u9ad8\u60ac\u8d4f\u5566~~",
                                    autoDispose: !0,
                                    close: function () {
                                        window.location.reload(!0)
                                    }
                                });
                                setTimeout(function () {
                                    e.close()
                                }, 2e3), l.cookie.set("IK_QB_ALTER", 0)
                            }, syncId: "enhancescore"
                        })
                    }
                })
            } catch (e) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: e.message,
                    path: "question:widget/ask/asker/asker.js",
                    method: "",
                    ln: 214
                })
            }
        }), l("#enhance-cancel").click(a)
    }

    function c() {
        l("#getwealth-submit").click(function (e) {
            try {
                e.preventDefault(), new d({
                    params: {cm: 100045, qid: F.context("page").qid}, beforeJump: function () {
                        var e = new p({
                            width: 350,
                            height: 160,
                            title: "\u77e5\u9053\u63d0\u793a",
                            content: "\u95ee\u9898\u5df2\u7ecf\u5173\u95ed\u5566~~",
                            autoDispose: !0,
                            close: function () {
                                window.location.reload(!0)
                            }
                        });
                        setTimeout(function () {
                            e.close()
                        }, 2e3)
                    }, syncId: "acceptGetWealth"
                })
            } catch (e) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: e.message,
                    path: "question:widget/ask/asker/asker.js",
                    method: "",
                    ln: 247
                })
            }
        }), l("#getwealth-cancel").click(a)
    }

    function r() {
        l("#wgt-ask").mouseenter(function () {
            l(".i-x", this).show(), l(".question-tag-change", this).show()
        }).mouseleave(function () {
            l(".i-x", this).hide(), l(".question-tag-change", this).hide()
        });
        l("#wgt-ask .i-x").mouseenter(function () {
        }).mouseleave(function () {
        }).on("click", function (e) {
            try {
                e.preventDefault();
                var t = {cm: 100013, qid: F.context("page").qid};
                if (F.context("user").wealth < 50)return void p.alert(['<p>\u5220\u9664\u5f53\u524d\u63d0\u95ee\u9700\u8981\u82b1\u8d39<span class="f-red ml-5 mr-5">50</span>\u8d22\u5bcc\u503c</p>', "<p>\u60a8\u5f53\u524d\u6301\u6709", '<span class="f-red ml-5 mr-5">', F.context("user").wealth, "</span>\u8d22\u5bcc\u503c\uff0c\u65e0\u6cd5\u5220\u9664</p>", '<a href="http://zhidao.baidu.com/browse/" target="_blank">', "\u7acb\u523b\u53bb\u7b54\u9898\uff0c\u8d5a\u53d6\u66f4\u591a\u8d22\u5bcc\u503c", "</a>"].join(""));
                var n = "";
                n = 1 == F.context("user").delSelfQuestion ? "\u60a8\u62e5\u6709\u5220\u9664\u63d0\u95ee\u7684\u7279\u6743<br/>" : ['\u5220\u9664\u5f53\u524d\u63d0\u95ee\u9700\u8981\u82b1\u8d39<span class="f-red ml-5 mr-5">50</span>\u8d22\u5bcc\u503c<br />', '\u60a8\u76ee\u524d\u6301\u6709<span class="f-red ml-5 mr-5">', F.context("user").wealth, "</span>\u8d22\u5bcc\u503c<br />"].join(""), n += "\u786e\u5b9a\u5220\u9664\u5417\uff1f", p.confirm(n, {
                    onaccept: function () {
                        new d({
                            url: "/submit/ajax", params: t, beforeJump: function () {
                                p.close();
                                var e = new p({
                                    width: 350,
                                    height: 160,
                                    title: "\u77e5\u9053\u63d0\u793a",
                                    content: '<div class="mt-20">\u5220\u9664\u63d0\u95ee\u6210\u529f\u5566~~</div>',
                                    autoDispose: !0,
                                    close: function () {
                                        window.location.reload(!0)
                                    }
                                });
                                setTimeout(function () {
                                    e.close()
                                }, 2e3)
                            }, errorDeal: function () {
                                p.alert("\u5220\u9664\u63d0\u95ee\u5931\u8d25\u4e86: (")
                            }
                        })
                    }
                })
            } catch (e) {
                "undefined" != typeof alog && alog("exception.fire", "catch", {
                    msg: e.message,
                    path: "question:widget/ask/asker/asker.js",
                    method: "",
                    ln: 341
                })
            }
        })
    }

    var l = e("common:widget/js/util/tangram/tangram.js"), h = e("question:widget/js/editor/editor.js"),
        d = (e("common:widget/js/ui/tip/tip.js"), e("common:widget/js/logic/submit/submit.js")),
        u = e("common:widget/js/util/log/log.js"), m = e("common:widget/js/util/event/event.js"),
        p = e("common:widget/js/ui/dialog/dialog.js"), f = e("common:widget/js/util/countdown/countdown.js"), g = -1;
    n.exports.init = function (e) {
        try {
            e = e || 0, e = parseInt(e), e > 0 && new f([{
                seconds: e,
                elem: l(".ask-time-left .time-left-num"),
                callback: function (e) {
                    this.elem.text([e.dd, "\u5929", e.HH, "\u5c0f\u65f6", e.mm, "\u5206", e.ss, "\u79d2"].join(""))
                },
                complete: function () {
                    this.elem.parent().remove(), l(".close-ask").show()
                }
            }]).start(), o(), i(), c(), r()
        } catch (t) {
            "undefined" != typeof alog && alog("exception.fire", "catch", {
                msg: t.message,
                path: "question:widget/ask/asker/asker.js",
                method: "",
                ln: 375
            })
        }
    }
});
;define("question:widget/asker-push/asker-push.js", function (e, t, i) {
    var n = e("common:widget/js/util/tangram/tangram.js"), a = e("common:widget/js/ui/base/base.js"),
        s = e("common:widget/js/util/template/template.js"), o = e("common:widget/js/util/store/store.js"),
        r = (e("common:widget/js/util/event/event.js"), e("common:widget/js/util/log/log.js")),
        u = (e("common:widget/js/util/img-resize/img-resize.js"), a(function (e) {
            var t = this;
            t.options = n.extend({pushUrl: "/api/newaskpush", container: n(".wgt-asker-push")}, e);
            t.options;
            t.options.container.show(), t.word = n.trim(n.string.decodeHTML(F.context("page").title)), t.content = n.trim(n.string.decodeHTML(F.context("page").con))
        }).extend({
            init: function () {
                try {
                    var e = this;
                    e.getData()
                } catch (t) {
                    "undefined" != typeof alog && alog("exception.fire", "catch", {
                        msg: t.message,
                        path: "question:widget/asker-push/asker-push.js",
                        method: "",
                        ln: 42
                    })
                }
            }, render: function (e) {
                var t = this, i = t.options.container;
                if (t.type) {
                    var a = document.getElementById("t:asker-push-title");
                    n(a.innerHTML).appendTo(i), n(".wgt-ask").removeClass("no-border"), t.delay()
                }
                if (e.baike || e.related) {
                    e.baike && (n(t.encodeHTML(s("t:asker-push-baike", e))).appendTo(i), i.find(".asker-push-pic img").imgResize(132, 101)), e.related && (e.word = encodeURIComponent(t.word), n(t.encodeHTML(s("t:asker-push-list", e))).appendTo(i)), t.listItemHeights = [];
                    var o = i.find(".asker-push-baike").height() || 0;
                    o > 0 && (o += 20), i.find(".asker-push-item").each(function () {
                        t.listItemHeights.push(o += n(this).outerHeight())
                    }), r.addKey({ctime: n.date.format(new Date(1e3 * t.ctime), "yyyy-MM-dd")}), r.send({
                        action: "load",
                        type: 2014,
                        "asker-push": e.baike ? 1 : 2,
                        qid: F.context("page").qid
                    })
                } else t.error("\u62b1\u6b49\uff0c\u672a\u627e\u5230\u76f8\u5173\u77e5\u8bc6\uff0c\u8bf7\u60a8\u8010\u5fc3\u7b49\u5f85\u7f51\u53cb\u89e3\u7b54")
            }, sub: function (e, t) {
                var i = n.string.getByteLength, a = n.string.subByte;
                return e = (e || "").replace(/<[^>]*>/g, ""), t = "number" != n.type(t) ? 9999999 : t, i(e) > t ? a(e, t - 2) + "..." : e
            }, unique: function (e) {
                for (var t = [], i = {}, n = 0, a = e.length; a > n; !i[e[n++].qid] && (i[e[n - 1].qid] = e[n - 1]));
                for (n in i)t.push(i[n]);
                return t
            }, filter: function (e) {
                var t = this, i = {};
                return 0 == e.type && e.wiki && e.wiki.picSrc && (t.type = "baike", i.baike = e.wiki, i.baike.title = t.sub(i.baike.title), i.baike.abstract = t.sub(i.baike.abstract, 270), i.baike.title = i.baike.title.replace(/</g, "&lt;").replace(/>/g, "&gt;"), i.baike.abstract = i.baike.abstract.replace(/</g, "&lt;").replace(/>/g, "&gt;")), e.list && e.list.length && (t.type = "related", i.related = t.unique(e.list), n(i.related).each(function () {
                    this.title = t.sub(this.title, 90), this.answer = t.sub(this.answer, 176), this.title = this.title.replace(/</g, "&lt;").replace(/>/g, "&gt;"), this.answer = this.answer.replace(/</g, "&lt;").replace(/>/g, "&gt;")
                }), i.related.length = i.baike && i.related && i.related.length > 2 ? 2 : 3), i
            }, getData: function () {
                var e = this;
                n.post(e.options.pushUrl, {word: e.word, content: e.content}, function (t) {
                    0 == t.errno && t.totalNum > 0 ? e.render(e.filter(t)) : e.error("\u62b1\u6b49\uff0c\u672a\u627e\u5230\u76f8\u5173\u77e5\u8bc6\uff0c\u8bf7\u60a8\u8010\u5fc3\u7b49\u5f85\u7f51\u53cb\u89e3\u7b54")
                }, "json")
            }, delay: function () {
                function e() {
                    {
                        var e = i.find(".asker-push-list");
                        t.listItemHeights.length
                    }
                    n({}).queue(function () {
                        a.remove(), i.height("auto"), e.fadeIn()
                    })
                }

                var t = this, i = t.options.container, a = i.find(".asker-push-loading");
                n({}).delay(1500).queue(function () {
                    a.css({
                        width: "490px",
                        height: "30px",
                        left: "100px",
                        "padding-top": "0px",
                        top: "60px"
                    }).animate({"font-size": 0, "line-height": 0, opacity: 0});
                    var t = i.find(".asker-push-baike");
                    t.size() > 0 && n({}).queue(function () {
                        i.height(192).addClass("wgt-asker-push-baike"), t.fadeIn()
                    }), i.find(".asker-push-list").hide(), n({}).delay(1e3).queue(function () {
                        e()
                    })
                })
            }, encodeHTML: function (e) {
                return e.replace(/&lt;font color=&quot;#C60A00&quot;&gt;/g, '<font color="#C60A00">').replace(/&lt;\/font&gt;/g, "</font>").replace(/&lt;br&gt;/g, "<br>")
            }, error: function (e) {
                var t = this.options.container;
                n({}).delay(1500).queue(function () {
                    t.find(".asker-push-loading").text(e), n({}).delay(1500).queue(function () {
                        t.animate({height: 0, "padding-top": 0, "padding-bottom": 0}).queue(function () {
                            t.remove()
                        })
                    })
                }), o.set("IK_IS_ASKER_PUSH", F.context("page").qid)
            }
        }));
    i.exports.init = function (e) {
        try {
            if (o.get("IK_IS_ASKER_PUSH") == F.context("page").qid)return;
            new u({ctime: e})
        } catch (t) {
            "undefined" != typeof alog && alog("exception.fire", "catch", {
                msg: t.message,
                path: "question:widget/asker-push/asker-push.js",
                method: "",
                ln: 256
            })
        }
    }
});