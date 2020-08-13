var obSections = {
    onChangeElement: function( select ) {
        var value = select.value;
        if( value != '' ) {
            window.location = value;
        }
    },
    onChangeSection: function( select ) {
        var value = select.value;
        if( value != '' ) {
            window.location = value;
        }
    },
    bind: function () {

    },

    init: (function () {
        $(function () {
            obSections.bind();
        });
    })()
}