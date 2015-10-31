CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here.
    // For the complete reference:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbar = [
        
        { name: 'clipboard', items:['Undo', 'Redo']},
		{ name: 'basicstyles', items : ['Bold', 'Italic'] },
        { name: 'paragraph', groups: ['list', 'align'], items: ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'] },
	    { name: 'links', items: ['Link', 'Unlink'] },
        { name: 'document', items : ['Source']}
		
    ];

    // Remove some buttons, provided by the standard plugins, which we don't
    // need to have in the Standard(s) toolbar.
    config.language = 'en';
    //config.dialog_backgroundCoverColor = "#000000";
    
    // Se the most common block elements.
    config.format_tags = 'p;h2';

    // Make dialogs simpler.
    config.removeDialogTabs = 'image:advanced;link:advanced';
    config.skin='moono';

};