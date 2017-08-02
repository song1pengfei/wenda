/**
 * @file common.js
 */

/**
 * @type {string}
 */
// Figure out what browser is being used
var userAgent = navigator.userAgent.toLowerCase();
jQuery.browser = {
    version: (userAgent.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [])[1],
    safari: /webkit/.test(userAgent),
    opera: /opera/.test(userAgent),
    msie: /msie/.test(userAgent) && !/opera/.test(userAgent),
    mozilla: /mozilla/.test(userAgent) && !/(compatible|webkit)/.test(userAgent)
};
// 用于给对象附加事件
jQuery.attachEvent = function (obj, evt, func, eventobj) {
    eventobj = !eventobj ? obj : eventobj;
    if (obj.addEventListener) {
        obj.addEventListener(evt, func, false);
    } else if (eventobj.attachEvent) {
        obj.attachEvent('on' + evt, func);
    }
};

/**
 * 类的声明
 * @class
 * @type {{create: create}}
 */
var $Class = {
    create: function () {
        var obj = arguments.length ? arguments[0] : null;
        return function () {
            if (obj == null) {
                obj = this;
            }
            var init = obj.$init || obj.init || obj.initialize;
            init.apply(obj, arguments);
            return obj;
        };
    }
};

if (typeof(body) === 'undefined') {

    /**
     * body方法
     * @return {Object}
     */
    function body() {
        var F = 0;
        var D = 0;
        var A = 0;
        var I = 0;
        var G = 0;
        var E = 0;
        var B = window;
        var J = document;
        var C = J.documentElement;
        F = C.clientWidth || J.body.clientWidth;
        D = B.innerHeight || C.clientHeight || J.body.clientHeight;
        I = J.body.scrollTop || C.scrollTop;
        A = J.body.scrollLeft || C.scrollLeft;
        G = Math.max(J.body.scrollWidth, C.scrollWidth || 0);
        E = Math.max(J.body.scrollHeight, C.scrollHeight || 0, D);
        return {
            scrollTop: I,
            scrollLeft: A,
            documentWidth: G,
            documentHeight: E,
            viewWidth: F,
            viewHeight: D
        };
    }
}

/**
 * exeJsonp
 * @param {string} apiid dom节点id
 * @param {string} url url链接
 */
function exeJsonp(apiid, url) {
    var ss = document.getElementById(apiid);
    if (ss) {
        document.body.removeChild(ss);
    }
    ss = document.createElement('script');
    ss.id = apiid;
    ss.src = url + '&t=' + Math.random();
    ss.charset = 'utf-8';
    document.body.appendChild(ss);
}
var footer = {
    init: function () {
        var ft = $('.footer');
        if (ft !== undefined && ft.length > 0) {
            $.attachEvent(window, 'resize', this.adjust, document);
            this.adjust();
        }
    },
    adjust: function () {
        var bH = 0;
        var mTop = 109;
        var wH = $(window).height();
        var ft = $('.footer');
        var rbar = $('.right-bar');
        var lbar = $('.left-bar');

        var hH = $('.header').height();
        var bnnH = $('.banner-title').height();
        var fH = ft.height();
        fH = fH < ft[0].clientHeight ? ft[0].clientHeight : fH;
        if (lbar !== undefined && lbar.length > 0) {
            var minH = 800;
            var mbH = $('.main-b').height();
            var lbH = lbar.height();
            var rbH = rbar.height();

            if (mbH > 0) {
                bH = mbH;
            } else {
                var mH = $('.setTab-panel:visible').height();
                var tipH = $('.tip').height();
                var pnH = $('.pro-name').height();
                var mBottom = 100;
                bH += mBottom + mH + tipH + pnH;
            }
            bH = bH > lbH ? bH : lbH;
            bH = bH > rbH ? bH : rbH;
            bH = bH > minH ? bH : minH;
            bH += mTop + hH + bnnH + fH;
        } else {
            var sbar = $('.side-bar');
            if (sbar !== undefined && sbar.length > 0) {
                var sH = sbar.height();
                var conH = $('.content').height();

                bH = sH > conH ? sH : conH;
                bH += mTop + hH + bnnH + fH;
            } else {
                bH = $('body').height();
            }
        }
        if (bH < wH) {
            ft.css({
                position: 'fixed',
                bottom: 0
            });
        } else {
            ft.css({
                position: 'relative',
                bottom: 'auto'
            });
        }
    }
};
/**
 * @class 定义
 * @type {*}
 */
var SetTab = $Class.create({
    options: {
        // tabs wrap id
        tabWrapId: '',
        // cnts wrap id
        cntWrapId: '',
        // 默认初始化显示第index个tab标签(从0开始)
        showIndex: null,
        // class 前缀, 寻找tabclass为 前缀+tab，如'setTab-tab', panelClas为'setTab-panel'
        classPrefix: 'setTab-',
        // 标识当前tab的classname
        tabOnClass: 'side-active',
        // 事件类型
        eType: 'click',
        // 回调函数
        eCallback: null
    },
    init: function (htOptions) {
        baidu.object.merge(this.options, htOptions || {}, {overwrite: true});
        this.getElems();
        if (this.tabs.length <= 0) {
            return;
        }
        this.bindEvt();
        if (typeof(htOptions['showIndex']) !== 'undefined') {
            this.show(htOptions['showIndex']);
        }
    },
    getElems: function () {
        var opt = this.options;
        this.tabs = baidu('#' + opt['tabWrapId']).children('.' + opt['classPrefix'] + 'tab');
        this.cnts = $('#' + opt['cntWrapId']).children('.' + opt['classPrefix'] + 'panel');
    },
    bindEvt: function () {
        var self = this;
        var tabs = self.tabs;
        var opt = self.options;
        var eType = opt.eType;
        tabs.each(function (index, item) {
            baidu.dom(item)[eType](function (e) {
                // e.preventDefault();
                self.show(index);
            });
        });
    },

    show: function (index) {
        var self = this;
        var tabs = self.tabs;
        var cnts = self.cnts;
        var opt = self.options;
        var tabOnClass = opt['tabOnClass'];
        if (index >= tabs.length || index < 0) {
            index = 0;
        }
        tabs.each(function (e) {
            tabs.eq(e).find('a').eq(0).removeClass(tabOnClass);
        });
        tabs.eq(index).find('a').eq(0).addClass(tabOnClass);
        cnts.hide();
        cnts.eq(index).show();
        footer.adjust();
        if (opt['eCallback']) {
            opt['eCallback'](index);
        }
    }
});

/**
 * search
 */
function initSearchForm() {
    var oInput = baidu('#search_txt');
    var defVal = oInput.attr('placeholder');
    var formO = baidu('#searchForm');
    var curVal = defVal;
    var isEmpty = function () {
        var val = baidu.string(oInput.val());
        var reval = val.trim();
        return (val.length <= 0 || reval === defVal);
    };
    var onFocus = function () {
        if (baidu.string(this.value).trim() === defVal) {
            this.value = '';
        }
    };
    var onBlur = function () {
        if (isEmpty()) {
            this.value = defVal;
        }
        curVal = this.value;
    };
    var onSubmit = function (e) {
        if (isEmpty()) {
            e.preventDefault();
        }
    };
    oInput.on('focus', onFocus);
    oInput.on('blur', onBlur);
    formO.on('submit', onSubmit);
    formO.on('webkitspeechchange', function () {
        var newVal = oInput.val();
        if (curVal === defVal) {
            oInput.val(newVal.replace(curVal, ''));
        }
        formO.submit();
    });
}

/**
 * 显示分页
 * @param {string} url 页面链接
 * @param {number} curPage 当前页码
 * @param {number} totalPage 总页数
 * @param {bool} isShowEndPage 是否显示尾页
 * @param {number} id id
 */
function showPage(url, curPage, totalPage, isShowEndPage, id) {
    var pageStart = 0;
    var pageEnd = 0;
    var pageShow = 2;
    var str = '';
    if (totalPage === 0) {
        totalPage = 1;
    }
    if (totalPage === 1) {
        return;
    }
    if (curPage > 1) {
        str += '<a href=\'' + url + 'page=1\' class=\'btnPage\'>首页</a>';
    }

    if (curPage > 1) {
        str += '<a href=\'' + url + 'page=' + (curPage - 1) + '\' class=\'btnPage btnPrev\'>&lt;上一页</a>';
    }

    pageStart = curPage - pageShow - 1;
    pageEnd = curPage + pageShow + 1;

    if (curPage <= pageShow) {
        pageEnd = pageShow + pageShow + 2;
    }

    if (totalPage - curPage <= pageShow) {
        pageStart = totalPage - pageShow - pageShow - 1;
    }

    for (var i = pageStart; i <= pageEnd; i++) {
        if (i === 1) {
            if (curPage === 1) {
                str += '<a href=\'' + url + 'page=1\' class=\'current\'>1</a>';
            } else {
                str += '<a href=\'' + url + 'page=1\'>1</a>';
            }
        }
        if (i > 1 && i <= totalPage) {
            if (i === curPage) {
                str += '<a href=\'' + url + 'page=' + i + '\' class=\'current\'>' + i + '</a>';
            } else {
                str += '<a href=\'' + url + 'page=' + i + '\'>' + i + '</a>';
            }
        }
    }

    if (curPage < totalPage) {
        str += '<a href=\'' + url + 'page=' + (curPage + 1) + '\' class=\'btnPage btnPrev\'>下一页&gt;</a>';
    }

    if (curPage < totalPage && isShowEndPage) {
        str += '<a href=\'' + url + 'page=' + totalPage + '\' class=\'btnPage\'>末页</a>';
    }
    document.getElementById(id).innerHTML = str;
}

/**
 * 登录
 * @type {{init: init, bindLogin: bindLogin, popup: popup}}
 */
var login = {
    timer: null,
    data: null,
    passHost: '',
    staticPage: '',
    passTpl: '',
    init: function (host, spage, tpl) {
        this.passHost = host;
        this.staticPage = spage;
        this.passTpl = tpl;
        this.bindLogin();
        this.bindHandle();
    },
    bindHandle: function () {
        var t = this;
        // 登录信息的显影
        // Removed By Linyu
        // $('#selMoreInfo').mouseover(function () {
        //     t.clear();
        //     $('#login').removeClass('on');
        //     $('#moreLoginInfo').removeClass('hid');
        // }).mouseout(function () {
        //     t.timer = window.setTimeout(t.hide, 3000);
        // });
        // Added By Linyu
        var overLog = false;
        $('.loginfo').bind('click', null, function () {
            t.clear();
            $('#login').removeClass('on');
            $('#moreLoginInfo').removeClass('hid');
        });
        $('.loginfo').hover(function () {
            overLog = true;
        }, function () {
            overLog = false;
        });

        $(document).bind('click', function (e) {
            // 浏览器兼容性
            var e = e || window.event;
            var elem = e.target || e.srcElement;
            var jel = $(elem);

            if (!overLog) {
                $('#moreLoginInfo').addClass('hid');
            }
        });

        // $('#moreLoginInfo').mouseover(function () {
        //     t.clear();
        //     $('#moreLoginInfo').removeClass('hid');
        // }). mouseout(function () {
        //     t.timer = window.setTimeout(t.hide, 3000);
        // });

        $('#btnLogout').click(function (e) {
            window.location.href = login.passHost + '?logout&aid=7&u=' + escape(window.location.href);
            e.preventDefault();
        });
    },
    bindLogin: function () {
        var btnLog = baidu('#btnLogin');
        var self = this;
        btnLog.on('click', function (e) {
            e.preventDefault();
            self.popup();
        });
        baidu('#form-panel').find('a.btnLog').on('click', function (e) {
            e.preventDefault();
            self.popup();
        });
    },
    clear: function () {
        window.clearTimeout(this.timer);
    },
    hide: function () {
        if (!($('#moreLoginInfo').hasClass('hid'))) {
            $('#moreLoginInfo').addClass('hid');
        }
    },
    popup: function (onSucc, onFail) {
        var loginpop = this.loginpop;
        if (loginpop) {
            loginpop.show();
            return;
        }

        var defLoginFail = function () {
            window.location.href = login.passHost + '/?login&tpl=' + login.passTpl + '&u=' + escape(location.href);
        };

        var onLoginFailed = onFail ? onFail : defLoginFail;
        var logCfg = {
            cache: true,
            apiOpt: {
                product: login.passTpl,
                staticPage: login.staticPage,
                u: window.location.href
            },
            onSubmitedErr: onLoginFailed,
            onLoginSuccess: function () {
                if (typeof window.location.reload !== undefined) {
                    window.location.reload();
                } else {
                    window.location.href = window.location.href;
                }
            }
        };
        if (onSucc) {
            logCfg.onLoginSuccess = onSucc;
        }
        /* globals passport */
        loginpop = passport.pop.init(logCfg);
        this.loginpop = loginpop;
        this.loginPanelInit = true;
        loginpop.show();
    },
    count: function () {
        var errFun = function () {};
        var t = this;
        $.ajax('/api/count', {
            type: 'get',
            dataType: 'json',
            success: function (result) {
                /*result: {
                 'errNo' : '0',   //0--success
                 }*/
                var isHasData = result.data !== undefined && parseInt(result.data.total, 10) > 0;
                if (result['errno'] === 0 && isHasData) {
                    $('#login').addClass('on');
                    $('#more-login-show').addClass('on');
                    t.data = result.data;
                } else {
                    errFun();
                }
            },
            error: errFun
        });
    }
};

/**
 * 上传图片
 * @type uploadImg
 */
var uploadImg = {
    btns: null,
    init: function () {
        var self = this;
        var btns = self.btns = baidu('#form-panel').find('a.btn-upload-img');
        if (btns.length <= 0) {
            return;
        }
        btns.click(function (e) {
            e.preventDefault();
            var btn = baidu(this);
            var w = btn.attr('pop-width') * 1;
            var h = btn.attr('pop-height') * 1;
            self.showPop(btn.attr('href'), w, h, btn);
        });
    },
    showPop: function (url, w, h, srcElem) {
        url = url + (url.indexOf('?') === -1 ? '?' : '&') + 't=' + (new Date()).getTime();
        var bro = $.browser;
        if (bro.msie && bro.version === '6.0') {
            if (h === undefined || isNaN(h)) {
                h = 300;
            }
        } else {
            if (h === undefined || isNaN(h)) {
                h = 242;
            }
        }
        /* globals Popup */
        Popup.init({
            title: '上传附件',
            type: 'iframe',
            content: url,
            width: w || 505,
            height: h,
            element: srcElem
        });
    },
    clearImgPreview: function (formIdFlag) {
        var previewId = 'form' + formIdFlag + '_imagePreview';
        document.getElementById(previewId).innerHTML = '';
    },
    // 一次上传一张图片
    showSmallImg: function (formIdFlag, picUrl) {
        var btnDelId = 'form' + formIdFlag + '_upImg_del';
        var htm = '<div class="small-image"><img src="' + picUrl + '" alt="" class="pic"/>';
        htm += ' <a href="#" id="' + btnDelId + '" class="img-del"></a></div>';
        var imgPrevew = baidu('#form' + formIdFlag + '_imagePreview');
        imgPrevew.hide();
        imgPrevew.append(htm);
        var btnDel = baidu('#' + btnDelId);
        var obj = $('#form' + formIdFlag + '_imagePreview');
        obj.parent().next().show();
        btnDel.click(function (e) {
            e.preventDefault();
            uploadImg.deleteImg(formIdFlag);
        });
    },

    deleteImg: function (formIdFlag) {
        var idPre = 'form' + formIdFlag;
        document.getElementById(idPre + '_imagePreview').style.display = 'none';
        document.getElementById(idPre + '_uploadImage').style.display = '';
        document.getElementById(idPre + '_imageId').value = '';
        uploadImg.arrayImgs($('#' + idPre + '_uploadImage').parent());
    },
    arrayImgs: function (hObj) {
        var ul = hObj.parent();
        hObj.hide();
        hObj.appendTo(hObj.parent());
        var lis = ul.find('li');
        if (lis.filter(':visible').length === 0) {
            lis.filter(':first').show();
        } else {
            if (lis.length > 1) {
                var lastli = lis.filter(':visible').filter(':last');
                if (lastli.find('.btn-upload-img').filter(':visible').length === 0) {
                    lastli.next().show();
                }
            }
        }
    },
    uploadImgSuccess: function (formIdFlag, picId) {
        if (picId === '' || typeof(picId) === 'undefined') {
            return;
        }
        var idPre = 'form' + formIdFlag;
        document.getElementById(idPre + '_uploadImage').style.display = 'none';
        document.getElementById(idPre + '_imagePreview').style.display = '';
        document.getElementById(idPre + '_imageId').value = picId;
        var bro = $.browser;
        if (bro.msie && bro.version === '6.0') {
            var img = $('#' + idPre + '_imagePreview');
            var imgDel = $('#' + idPre + '_imagePreview').find('.img-del');
            imgDel.css({
                left: img.position().left + 65
            });
        }
    },
    // 一次上传多张图片时使用,投诉目前未用到
    showSmallImgLst: function (formIdNum, picUrl, index) {
        // var smImgId = "form" + formIdNum +"_smallImage" + index;
        /* globals smImgId */
        /* globals btnDelId */
        var htm = [];
        htm.push('<li class="smallImage" id="' + smImgId + '">');
        htm.push('<img src="' + picUrl + '" alt="" style="width:120px;height:120px" class="pic"/>');
        htm.push('<a href="#" id="' + btnDelId + '" formid="' + formIdNum + '" pindex="' + index + '">删除</a></li>');
        var imgPrevew = baidu('#form' + formIdNum + '_imagePreview');
        imgPrevew.hide();
        imgPrevew.append(htm.join(''));
        var btnDel = baidu('#' + btnDelId);
        btnDel.click(function (e) {
            e.preventDefault();
            uploadImg.deleteImgLst(formIdNum, baidu.dom(this).attr('pindex'));
        });
    },
    // 一次上传多张图片时,删除其中任一张，使用,投诉目前未用到
    deleteImgLst: function (formId, picIndex)
    {
        var smImgId = baidu('#form' + formId + '_smallImage' + picIndex);
        var imgPreview = baidu('#form' + formId + '_imagePreview');
        smImgId.remove();
        baidu('#form' + formId + '_imageId_' + picIndex).remove();
        if (imgPreview.children('li').length <= 0) {
            imgPreview.hide();
            document.getElementById('form' + formId + '_uploadImage').style.display = '';
        }
    },
    // 显示图片链接
    showImgLink: function (formIdFlag, picUrl) {
        var btnUp = baidu('#form' + formIdFlag + '_uploadImage');
        var preview = baidu('#form' + formIdFlag + '_imagePreview');
        var btnDelId = 'form' + formIdFlag + '_upImg_del';
        var htm = '<a href="' + picUrl + '" target="_blank">查看图片</a> <a href="#" id="' + btnDelId + '">删除</a>';
        // btnUp.hide();
        preview.html(htm).hide();
        baidu('#' + btnDelId).click(function (e) {
            e.preventDefault();
            uploadImg.deleteImg(formIdFlag);
        });
    },
    showSmallImage: function (formIdNum, loc) {
        if (!document.getElementById('form' + formIdNum + '_uploadImage') || loc === '') {
            return;
        }
        var style = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale);';
        style += 'width:120px;height:120px;';
        var forIe = '<div id=\'form" + formIdNum + "_IEpreview\' class=\"pic\" style=\"' + style + '\"></div>';
        var forOt = '<img src=\'"+ loc +"\' style=\'width:120px;height:120px\' class=\"pic\"/>';
        var isLtIe10 = baidu.browser.ie && (baidu.browser.ie < 10);
        var img = isLtIe10 ? forIe : forOt;
        var btnDelId = 'form' + formIdNum + '_upImg_del';
        var inner = '<div class=\"smallImage\">' + img + '<span><a href=\"#\" id=\"';
        inner += btnDelId + '\" formid=\"' + formIdNum + '\">删除</a></div>';
        var imgPrev = baidu('#form' + formIdNum + '_imagePreview');
        imgPrev.html(inner);
        if (isLtIe10) {
            var ieImg = baidu('#form' + formIdNum + '_IEpreview')[0];
            ieImg.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = loc;
        }
        imgPrev.hide();
        baidu('#' + btnDelId).click(function (e) {
            e.preventDefault();
            uploadImg.deleteImage(formIdNum);
        });
    },
    uploadImageSuccess: function (formIdNum, picId, picIdFlag) {
        if (picId === '' || typeof(picId) === 'undefined') {
            return;
        }
        var idPre = 'form' + formIdNum + (picIdFlag ? ('_' + picIdFlag) : '');
        document.getElementById(idPre + '_uploadImage').style.display = 'none';
        document.getElementById(idPre + '_imagePreview').style.display = '';
        document.getElementById(idPre + '_imageId').value = picId;
    },
    deleteImage: function (formIdNum, picIdFlag) {
        var idPre = 'form' + formIdNum + (picIdFlag ? ('_' + picIdFlag) : '');
        document.getElementById(idPre + '_imagePreview').style.display = 'none';
        document.getElementById(idPre + '_uploadImage').style.display = '';
        document.getElementById(idPre + '_imageId').value = '';
    }
};
/**
 * 选择控件Select，Checkbox，Radio
 * 在jquery框架下实现
 * @type customDDl
 */
var customDDl = {
    init: function () {
        var ctrls = $('.bd-wrapper-dropdown');
        for (var i = 0, len = ctrls.length; i < len; i++) {
            if (!$(ctrls[i]).find('.selval').length) {
                var cul = $(ctrls[i]).find('ul');
                var html = '<div class="selval"></div>'
                         + '<div class="i-arrow"></div>'
                         + '<div class="clear"></div>';
                cul.before(html);

                cul.addClass('dropdown');

                var sel = $(ctrls[i]).find('.selval');
                var lion = cul.find('.on');
                sel.html(lion.html());
                sel.attr('val', lion.attr('val'));

                var hid = $(ctrls[i]).find('input[type="hidden"]');
                if (hid !== undefined && hid.length) {
                    hid.val(lion.attr('val'));
                }

            }
        }

        $('.bd-wrapper-dropdown .selval, .bd-wrapper-dropdown .i-arrow').bind('click', null, this.bindSelContainer);
        $('.bd-wrapper-dropdown ul li').bind('click', null, this.selectDrpItem);

        this.mouseEvents();

        $('.bd-check-box label').prepend('<span>&nbsp;</span>');
        $('.bd-check-box label').bind('click', null, this.bindClickCheck);

        $('.bd-radio label').prepend('<span>&nbsp;</span>');
        $('.bd-radio label').bind('click', null, this.bindClickRadio);

        $.fn.bdDdlVal = this.getSelectedValue;
        $.fn.bdChkVal = this.getCheckedValue;
        $.fn.bdRdoVal = this.getRadioValue;
        $.fn.setBdDDlWidth = this.setSelectWidth;
        $.fn.initDDl = this.initSelect;

        this.setDrpCtrlWidth();

        $(document).bind('click', function (e) {
            // 浏览器兼容性
            var e = e || window.event;
            var elem = e.target || e.srcElement;
            var jel = $(elem);

            if (!(jel.hasClass('bd-wrapper-dropdown') || jel.hasClass('i-arrow') || jel.hasClass('selval'))) {
                customDDl.hideSelector();
            }
        });
    },
    mouseEvents: function () {
        var bro = $.browser;
        if (bro.msie && bro.version === '6.0') {
            $('.bd-wrapper-dropdown ul li').bind('mouseover', null, function () {
                $(this).addClass('over');
            });

            $('.bd-wrapper-dropdown ul li').bind('mouseout', null, function () {
                $(this).removeClass('over');
            });
        }
    },
    initSelect: function () {
        var con = $(this);
        // con.setBdDDlWidth();

        var sel = con.find('.selval');
        var lion = con.find('li.on');
        sel.html(lion.html());
        sel.attr('val', lion.attr('val'));

        var hid = con.find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            hid.val(lion.attr('val'));
        }
        // con.find("li").click(customDDl.selectDrpItem);
        con.find('li').bind('click', null, customDDl.selectDrpItem);
        customDDl.mouseEvents();
    },
    getCheckedValue: function () {
        var hid = $(this).find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            return hid.val();
        }

        var vals = [];
        var chks = $(this).find('label.on');
        if (chks !== undefined && chks.length) {
            for (var i = 0, len = chks.length; i < len; i++) {
                var v = $(chks[i]).attr('val');
                if (v) {
                    vals.push(v);
                } else {
                    vals.push($(chks[i]).text());
                }
            }
        }
        return vals.join(',');
    },
    getRadioValue: function () {
        var hid = $(this).find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            return hid.val();
        }

        var rdo = $(this).find('label.on');
        if (rdo !== undefined && rdo.length) {
            var v = rdo.attr('val');
            if (v) {
                return v;
            }

            return rdo.text();
        }

        return '';
    },
    getSelectedValue: function () {
        var hid = $(this).find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            return hid.val();
        }

        if ($(this).hasClass('bd-wrapper-dropdown')) {
            var sel = $(this).find('.selval');
            if (sel.length) {
                var val = sel.attr('val');
                if (val) {
                    return val;
                }

                return sel.html();
            }

        }
        return '';
    },
    setSelectWidth: function () {

        var w = 0;
        var elem = $(this);
        var con = elem.find('.dropdown');

        var bro = $.browser;
        if (bro.msie && (bro.version === '6.0' || bro.version === '7.0')) {
            var wstr = elem.attr('ddl-width');
            if (wstr === undefined) {
                w = 200;
            } else {
                w = parseInt(wstr, 10);
            }

            con.css({
                width: w
            });
            elem.find('li').css({
                width: w
            });
            w -= 6;
        } else {
            w = con.width()
                - parseInt(elem.css('padding-right'), 10)
                - parseInt(elem.css('padding-left'), 10);
        }

        elem.css({
            width: w
        });

        elem.find('.selval').css({
            width: w - 16
        });
    },
    setDrpCtrlWidth: function () {
        var selCtrls = $('.bd-wrapper-dropdown');
        if (selCtrls !== undefined && selCtrls.length) {
            for (var i = 0, len = selCtrls.length; i < len; i++) {
                var el = $(selCtrls[i]);
                if (!el.hasClass('linked')) {
                    $(selCtrls[i]).setBdDDlWidth();
                }
            }

        }

    },
    hideSelector: function () {
        // 隐藏其他所有的下拉框
        $('.i-arrow.show').each(function () {
            var el = $(this).parent();
            $(this).removeClass('show');
            el.find('.dropdown').hide();
        });
    },
    bindSelContainer: function () {
        var par = $(this).parent();
        var pos = $(this).parent().position();
        var con = par.find('.dropdown');

        var el = par;
        while (!el.hasClass('fk-list')) {
            el = el.parent();
        }
        el.parent().find('.fk-list').css({
            'z-index': 0
        });
        el.css({
            'z-index': 1
        });

        var bro = $.browser;
        var addLeft = 0;
        if (bro.msie && bro.version === '6.0') {
            addLeft = -10;
        }

        con.css({
            top: pos.top + par.height(),
            left: pos.left + addLeft
        });

        var ar = par.find('.i-arrow');
        if (ar.hasClass('show')) {
            con.hide();
        } else {
            customDDl.hideSelector();
            con.show();
        }
        ar.toggleClass('show');

    },
    selectDrpItem: function () {
        var par = $(this).parent();
        par.find('li').removeClass('on');
        $(this).addClass('on');

        var ppar = par.parent();

        var sel = ppar.find('.selval');
        var lion = $(this);
        sel.html(lion.html());
        sel.attr('val', lion.attr('val'));

        var hid = ppar.find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            hid.val(lion.attr('val'));
            if (hid.hiddenChange !== undefined && (typeof hid.hiddenChange === 'function')) {
                hid.hiddenChange();
            }
        }

        ppar.find('.i-arrow').toggleClass('show');
        par.hide();
    },
    bindClickCheck: function () {
        $(this).toggleClass('on');

        var hid = $(this).parent().find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            var vals = [];
            $(this).parent().find('label.on').each(function () {
                vals.push($(this).attr('val'));
            });
            hid.val(vals.join(','));
            if (hid.hiddenChange !== undefined && (typeof hid.hiddenChange === 'function')) {
                hid.hiddenChange();
            }
        }
    },
    bindClickRadio: function () {
        $(this).parent().find('label').removeClass('on');
        $(this).toggleClass('on');

        var hid = $(this).parent().find('input[type="hidden"]');
        if (hid !== undefined && hid.length) {
            hid.val($(this).attr('val'));
            if (hid.hiddenChange !== undefined && (typeof hid.hiddenChange === 'function')) {
                hid.hiddenChange();
            }
        }

    }
};

// 统计
var hm = function () {
    var hm = document.createElement('script');
    hm.type = 'text/javascript';
    hm.async = true;
    hm.src = 'http://hm.baidu.com/hm.js?fb481430f1a5a6c7044229532823b9fd';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(hm, s);
};

baidu.dom(document).ready(function () {
    initSearchForm();
    uploadImg.init();
    login.count();
    customDDl.init();
    hm();
    footer.init();
});
