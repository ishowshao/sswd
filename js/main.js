Zepto(function () {
    $('#original,#advanced').on('click', function () {
        $('#step-1').addClass('hidden');
        $('#step-2').removeClass('hidden');
        $('#game-type').val(this.id);
    });
    $('#has-judge').on('change', function () {
        if (this.checked) {
            $('.judge-setting').removeClass('hidden');
        } else {
            alert('您选择的是无法官玩法，只能由系统自动选择平民和卧底的词语');
            $('.judge-setting').addClass('hidden');
            $('#word-auto').click();
        }
    });
    $('[name=word-by]').on('change', function () {
        if (this.value === 'auto') {
            $('#submit').attr('disabled', 'disabled');
            // ajax
            $.get('word.php?game-type=' + $('#game-type').val(), function (res) {
                $('#submit').removeAttr('disabled');
                if (res) {
                    res = JSON.parse(res);
                    $('#civilian-word').val(res.data.civilian);
                    $('#spy-word').val(res.data.spy);
                }
            });
        } else {
            $('#civilian-word,#spy-word').val('');
        }
    });
    $('input[type=number],input[type=text]').on('blur', function () {
        $(this.parentNode)[this.value ? 'removeClass' : 'addClass']('has-error');
    });
    $('form [type=submit]').on('click', function (e) {
        var required = 0;
        $('input[type=number],input[type=text]').each(function () {
            if (!this.value) {
                $(this.parentNode).addClass('has-error');
            } else {
                required++;
            }
        });
        if (required !== 4) {
            e.preventDefault();
        }
    });
});
