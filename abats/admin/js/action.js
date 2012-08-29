function setHeight() {
    var cHeight = $('html').height() - $('#top').height();
    var contentHeight = cHeight + 'px';
    var contentHeightHalfShift = ( (cHeight / 2) -50 ) + 'px';
    var contentHeightHalf = (cHeight / 2) + 'px';
    $('#left').css('height' , contentHeight);
    $('#navigation-tree-pages').css('height' , contentHeight);
    $('#navigation-infoblocks').css('height' , contentHeight);
    $('.left-hide-show').css('height' , contentHeight);
    $('.sub-left-resize').css('height' , contentHeight);
    $('#content').css('height' , contentHeight);
    $('.hide, .show').each(function() {
        $(this).css('margin-top', contentHeightHalf);
    });
    $('.sub-left-resize .hide').each(function() {
        $(this).css('margin-top', contentHeightHalfShift);
    });
}

$(window).resize(function() {
    setHeight();
});

// load tree pages
function loadPages () {
    $.ajax({
		url: '/abats/admin/control/tree_pages.php',
		success: function(data) {
			$('#navigation-tree-pages').append(data);
            $('#navigation-tree-pages').next().show();
            $('#navigation-tree-pages').show();
            
            // tree pages hover
            $('#tree-pages-content a').hover(function() {
                $(this).stop().animate({'color' : '#ff0'}, 200);   
            }, function() {
                $(this).stop().animate({'color' : '#333'}, 200);
            });
            
            // link pages
            $('#tree-pages-content .tree-page a').click(function() {
                var path = $(this).attr('href');
                loadPage(path);
                return false;
            });
		}
	});
}

// load selected page
function loadPage (path) {
    $('#content').children().remove();
    $.ajax({
		url: '/abats/admin/control/page.php',
        type: 'POST',
		data: 'path=' + path,
		success: function(data) {
			$('#content').append(data);
            $('#content').next().show();
            $('#content').show();
		}
	});
}

// change hide or show directory
function changeTree (src) {
    if ($(src).attr('src') == 'img/minus.png') {
        $(src).attr('src', 'img/plus.png');
    } else {
        $(src).attr('src', 'img/minus.png');
    }
}

// document ready
$(document).ready(function() {
    
    setHeight();
    
    // on load
    var menu = $('.menu-sub-selected').attr('id');
    switch (menu) {
        case 'menu-pages':
            loadPages();
            break;
    }
    
    // select left menu
    $('#left-content ul li').click(function() {
        var menuNew = $(this).attr('id');
        var menuOld = $('#left-content ul li[class=menu-sub-selected]').attr('id');
        
        // hide old menu
        switch (menuOld) {
            case 'menu-pages':
                $('#navigation-tree-pages').hide(200).next().hide(200);
                $('#content-pages').hide(200);
                break;
            case 'menu-infoblocks':
                $('#navigation-infoblocks').hide(200).next().hide(200);
                $('#content-infoblocks').hide(200);
                break;
        }
        
        // show new menu
        switch (menuNew) {
            case 'menu-pages':
                if ( $('#navigation-tree-pages').next().children().attr('class') == 'hide') {
                    $('#navigation-tree-pages').show(200);
                }
                $('#navigation-tree-pages').next().show(200);
                $('#content-pages').show(200);
                break;
            case 'menu-infoblocks':
                if ( $('#navigation-infoblocks').next().children().attr('class') == 'hide') {
                    $('#navigation-infoblocks').show(200);
                }
                $('#navigation-infoblocks').next().show(200);
                $('#content-infoblocks').show(200);
                break;
        }
        
        $('#left-content ul li').removeClass('menu-sub-selected');
        $(this).addClass('menu-sub-selected');
        
    });
    
    // show hide left column
    $('.left-hide-show').toggle(function() {
        var block = $(this);
        $(block).animate({'background-color':'#fcffc9'}, 300);
        $(block).prev().hide(200, function() {
            $('.hide', block).removeClass('hide').addClass('show');
        });
    }, function() {
        var block = $(this);
        $(block).animate({'background-color':'#fcffc9'}, 300);
        $(block).prev().show(200, function() {
            $('.show', block).removeClass('show').addClass('hide');
        });
    });
    
    // animate color show hide line
    $('.left-hide-show').hover(function() {
        $(this).stop().animate({'background-color':'#fffc00'}, 300);
    }, function() {
        $(this).stop().animate({'background-color':'#fcffc9'}, 300);
    });
    
    // animate color resize line
    $('.sub-left-resize').hover(function() {
        if ($(this).children().attr('class') == 'hide') {
            $(this).stop().animate({'background-color':'#fffc00'}, 300);
        }
    }, function() {
        if ($(this).children().attr('class') == 'hide') {
            $(this).stop().animate({'background-color':'#fcffc9'}, 300);
        }
    });
    
    // animate color resize line
    $('.sub-left-resize .hide').hover(function() {
        $(this).parent().stop().animate({'background-color':'#fffc00'}, 300);
    }, function() {
        $(this).parent().stop().animate({'background-color':'#fcffc9'}, 300);
    });
    
    // menu title hover
    $('.menu-title').hover(function() {
        $(this).stop().animate({'background-color':'#fffc00'}, 300);
    }, function() {
        $(this).stop().animate({'background-color':'#fcffc9'}, 300);
    });
    
    // menu title click
    $('.menu-title').toggle(function() {
        $(this).removeClass('hide-menu').addClass('show-menu');
        $(this).next().slideUp(200);
    }, function() {
        $(this).removeClass('show-menu').addClass('hide-menu');
        $(this).next().slideDown(200);
    });
    
    // menu sub hover
    $('.menu-sub li').hover(function() {
        $(this).addClass('menu-sub-hover');
    }, function() {
        $(this).removeClass('menu-sub-hover');
    });
    
    // show hide sub-left column by click on resizable block
    $('.sub-left-resize .hide').toggle(function() {
        var block = $(this).parent();
        $(block).animate({'background-color':'#fcffc9'}, 300);
        $(block).prev().hide(200, function() {
            $('.hide', block).removeClass('hide').addClass('show');
            $(block).css('cursor', 'auto');
        });
    }, function() {
        var block = $(this).parent();
        $(block).animate({'background-color':'#fcffc9'}, 300);
        $(block).prev().show(200, function() {
            $('.show', block).removeClass('show').addClass('hide');
            $(block).css('cursor', 'e-resize');
        });
    });
    
    // resize sub-left
    var resize = false;
    var resizeStartX = 0;
    var resizeEndX = 0;
    var resizeBlock = '';
    var resizeBlockWidth = 0;
    
    $('.sub-left-resize').mousedown(function(e) {
        resizeStartX = e.pageX;
        resize = true;
        resizeBlock = $(this).prev();
        resizeBlockWidth = $(resizeBlock).width();
    });
    
    $(document).mouseup(function(e) {
        if (resize) {            
            resize = false;
        }
    });    
    
    $(document).mousemove(function(e) {
        if (resize) {
            resizeEndX = e.pageX;
            var shiftX = resizeEndX - resizeStartX;
            var newSize = resizeBlockWidth + shiftX;
            if (newSize < 500) {
                $(resizeBlock).width(newSize);     
            }
        }
    });
    
});