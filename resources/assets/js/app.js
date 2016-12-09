require('./bootstrap');

$(function () {
    var bodyEditor = new MediumEditor('.body-editable', {
        etensions: {
            insert: new MediumEditorInsert()
        }
    });
    // $('.bodyeditable').mediumInsert({
    //     editor: bodyEditor
    // });
});
