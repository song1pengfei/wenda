define("question:widget/push-mavin/push-mavin.js", function (a, i, e) {
    var n = a("common:widget/js/util/tangram/tangram.js"), t = a("common:widget/js/util/log/log.js"),
        s = a("common:widget/lib/juicer/juicer.js"), m = a("question:widget/js/card/card.js"),
        v = a("common:widget/js/ui/dialog/dialog.js"), u = (a("common:widget/js/util/https/https.js"), {
            init: function () {
                try {
                    n.ajax({
                        url: "/mavin/api/getrecmavin",
                        dataType: "json",
                        data: {
                            qid: F.context("page").qid,
                            title: F.context("page").title,
                            tags: F.context("page").tags.split("_").join(",")
                        },
                        success: function (a) {
                            if (!a.errno) {
                                var i = a.data;
                                if (i && i.list && i.listNum) {
                                    var e = i.list, u = s(n("#push-mavin-tpl").html(), {dataList: e});
                                    n(".push-mavin-con").html(u), n(".wgt-asker-push-mavin").slideDown(), F.context("pushMavin", e), n.each(e, function (a, i) {
                                        i.mavin && (F.context("pushMavin")[i.uid].userName = i.name, F.context("pushMavin")[i.uid].user = {
                                            mavinUtype: i.mavin.utype || "",
                                            mavinIsNew: i.mavin.isNew || "",
                                            mavinName: i.mavin.realName || "",
                                            mavinTitle: i.mavin.title || "",
                                            mavinAnswerNum: i.mavin.answerNum || "",
                                            mavinAdoptNum: i.mavin.adoptNum || "",
                                            mavinLevel: i.mavin.authLevel || "",
                                            mavinLevelTitle: i.mavin.levelTitle || "",
                                            mavinMajor: i.mavin.major || "",
                                            mavinHelpNum: i.mavin.helpNum || "",
                                            mavinPraise: i.mavin.praise || "",
                                            mavinLevelDesc: i.mavin.levelDesc || "",
                                            mavinFields: [],
                                            mavinAvatar: i.mavin.avatar || "",
                                            mavinDesc: i.mavin.desc
                                        }, n.each(i.mavin.fields, function (a, e) {
                                            F.context("pushMavin")[i.uid].user.mavinFields.push(e.name)
                                        }))
                                    }), n(".push-mavin-con .push-mavin-name").each(function (a, i) {
                                        new m({target: i, type: "pushMavin"})
                                    }), n(".push-mavin-con").on("click", ".push-mavin-btn", function (a) {
                                        try {
                                            a.preventDefault();
                                            var i = n(this);
                                            if (i.hasClass("disbale"))return;
                                            var e = i.data("uname");
                                            n.ajax({
                                                url: "/submit/askmavin",
                                                dataType: "json",
                                                data: {qid: F.context("page").qid, fix: e},
                                                success: function (a) {
                                                    return a.errno ? void v.alert(a.errmsg) : (i.addClass("disbale").html("<em></em><span>\u5df2\u9080\u8bf7</span>"), void t.send({
                                                        type: 2014,
                                                        area: "push_mavin_btn",
                                                        moudle: "question",
                                                        pos: "success",
                                                        action: "click"
                                                    }))
                                                }
                                            })
                                        } catch (a) {
                                            "undefined" != typeof alog && alog("exception.fire", "catch", {
                                                msg: a.message,
                                                path: "question:widget/push-mavin/push-mavin.js",
                                                method: "",
                                                ln: 109
                                            })
                                        }
                                    })
                                }
                            }
                        }
                    })
                } catch (a) {
                    "undefined" != typeof alog && alog("exception.fire", "catch", {
                        msg: a.message,
                        path: "question:widget/push-mavin/push-mavin.js",
                        method: "",
                        ln: 113
                    })
                }
            }
        });
    e.exports = u
});