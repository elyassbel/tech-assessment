const cookieName = 'client';

$(document).ready(function () {
    const $dynamicDiv = $('.dynamic-div');

    // Load the content into the dynamic div
    function loadContent(clientValue, id) {
        //const url = 'customs/'+clientValue+'/modules/'+module+'/'+script+'.php'
        const module = $dynamicDiv.data('module');
        const script = $dynamicDiv.data('script');
        console.log(module, script);
        $.post('app.php', {cookieValue: clientValue, id: id, module: module, script: script})
            .done(function (response){
                console.log('success');
                $dynamicDiv.html(response);
            })
            .fail(function (xhr, status, error) {
                console.log(error);
            });

        // Set current tab to active
        $("ul").find(`[data-cookie-value='${clientValue}']`).addClass('active');
    }

    // on page load
    let clientValue = $.cookie(cookieName);
    if (clientValue) {
        loadContent(clientValue);
    }

    // Change client button onClick event
    $('.clientBtn').click(function () {
        // Toggle active nav
        $('.nav').find('.active').removeClass('active');
        $(this).addClass('active');

        // Set values
        clientValue = $(this).data('cookie-value');
        $dynamicDiv.data('module','cars');
        $dynamicDiv.data('script','ajax');
        loadContent(clientValue);
    })

    // Edit view button onClick event
    $dynamicDiv.on('click', '.editBtn', function () {
        const carId = $(this).data('id');
        $dynamicDiv.data('script','edit');
        console.log(clientValue);
        loadContent(clientValue, carId);
    });

    // Back Btn
    $dynamicDiv.on('click', '.backBtn', function () {
        $dynamicDiv.data('script','ajax');
        loadContent(clientValue);
    });

    // Module Change
    $dynamicDiv.on('click', '.moduleBtn', function () {
        const module = $(this).data('module');
        $dynamicDiv.data('module', module);
        loadContent(clientValue);
    });
});
