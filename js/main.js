Zepto(function () {
    $('#original,#advanced').on('click', function () {
        $('#step-1').addClass('hidden');
        $('#step-2').removeClass('hidden');
    });
    $('#has-judge').on('change', function () {
        if (this.checked) {
            $('.judge-setting').removeClass('hidden');
        } else {
            alert('您选择的是无法官玩法，只能由系统自动选择平民和卧底的词语');
            $('.judge-setting').addClass('hidden');
        }
    });
    $('[name=word]').on('change', function () {
        if (this.value === 'auto') {
            // ajax
            $.get('word.php', function (res) {
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
});
