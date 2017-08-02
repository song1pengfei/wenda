/**
 * @file list-detail.js 菜单及内容的展开伸缩
 */
/* globals footer */

// 初始化左侧菜单
function initSide(on) {
    if (on === '0') {
        $('.show-hid ~ li ').hide();
        $('#hidden_li ~ li ').show();
        $('#show_li').show();
    } else if (on === '1') {
        $('#show_li').hide();
        $('.show-hid ~ li ').show();
    }
    footer.adjust();
}

// 右侧的展开伸缩
function initList() {
    var ArtLst = $('.q-list').eq(0);
    ArtLst.delegate('div.js-ques-show', 'click', function () {
        var ArtDiv = $(this);
        var On = ArtDiv.attr('on-show');
        if (On === '0') {
            $('.article').hide();
            $('.js-ques-show').attr('on-show', 0);
            $('.js-ques-show').removeClass('ques-show').removeClass('ques-hide').addClass('ques-hide');
            $('#article_' + ArtDiv.attr('data-id')).toggle();
            ArtDiv.removeClass('ques-hide').addClass('ques-show');
            ArtDiv.attr('on-show', 1);
            var qid = ArtDiv.attr('help_id');
            $.ajax('/api/browse', {
                type: 'post',
                dataType: 'json',
                data: {qid: qid},
                success: function () {

                }
            });

        } else if (On === '1') {
            $('#article_' + ArtDiv.attr('data-id')).toggle();
            ArtDiv.removeClass('ques-show').addClass('ques-hide');
            ArtDiv.attr('on-show', 0);
        }
        footer.adjust();
    });
}

function initClick() {
    $('.js-link-change').click(function () {
        var t = this;
        var prodId = $(this).attr('prodid');
        var hashid = $(this).attr('hashid');
        $.ajax('/api/click', {
            type: 'post',
            dataType: 'json',
            data: {prodid: prodId, hashid: hashid},
            success: function () {

            }
        });
    });
}