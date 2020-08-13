"use strict";

var dhl = {
  init: function init() {
    console.log('dhl init!');

    this.winResizeEvent();
    this.plugins.menu.init();
    this.plugins.toTopBtn.init();
    this.plugins.langChoice.init();
    this.plugins.siteForm.init();
    this.pages.indexPage.init();
    this.pages.destinationsPage.init();
    this.pages.trackingPage.init();
    this.pages.usefulPage.init();
  },
  winResizeEvent: function winResizeEvent() {
    var win = $(window),
        prevWidth = win.width(),
        prevHeight = win.height();

    win.on('resize', function () {
      var currentWidth = win.width(),
          currentHeight = win.height();

      if (currentWidth !== prevWidth) {
        win.trigger('hresize');
      }

      if (currentHeight !== prevHeight) {
        win.trigger('vresize');
      }

      prevWidth = currentWidth;
      prevHeight = currentHeight;
    });
  },

  plugins: {
    menu: {
      init: function init() {
        this.mobileBlock.init();
        this.desktopMenu.init();
        this.leftMenu.init();
      },

      desktopMenu: {
        init: function init() {
          var menuTop = '.site-header_menu_top';

          $(menuTop).find('li').each(function () {
            if ($(this).children('ul').length) {
              $(this).addClass('has-child');
            }
          });
        }
      },
      mobileBlock: {
        init: function init() {
          this.$mobileBlock = '.mobile-block';

          this.mobileBlockFormation();

          var mobileBlockBtn = '.site-header_top_menu-mobile',
              mobileBlockBtnClose = '.mobile-block_close',
              mobileBlockBtnBack = '.mobile-block_back';

          $(mobileBlockBtn).on('click', function () {
            $('body, html').addClass('open-menu');
          });

          $(document).on('click', mobileBlockBtnClose, function () {
            $('body, html').removeClass('open-menu');

            dhl.plugins.menu.mobileBlock.closeSubmenu();
          });

          $(this.$mobileBlock).on('click', '.has-child', function (e) {
            if (!$(this).has(e.target).length) {
              $(this).closest('.mobile-block').animate({
                scrollTop: 0
              }, 300);

              $(this).addClass('open-submenu').closest('.mobile-block').addClass('open-submenu');
            }
          });

          $(document).on('click', mobileBlockBtnBack, function () {
            dhl.plugins.menu.mobileBlock.closeSubmenu();
          });
        },
        closeSubmenu: function closeSubmenu() {
          if ($(this.$mobileBlock).hasClass('open-submenu')) {
            $(this.$mobileBlock).removeClass('open-submenu').find('.open-submenu').removeClass('open-submenu');
          }
        },
        mobileBlockFormation: function mobileBlockFormation() {
          var mobileMenuTop = $('.site-header_menu_top').clone(true),
              mobileMenuBottom = $('.site-header_menu_bottom').clone(true),
              mobileLangBlock = $('.site-header_lang').clone(true);

          $(this.$mobileBlock).append('<div class="mobile-block_header"></div>');

          var mobileBlockHeader = '.mobile-block_header';

          mobileLangBlock.addClass('site-header_lang_mobile').appendTo($(mobileBlockHeader));
          $(mobileBlockHeader).append('<div class="mobile-block_back">Назад</div>');
          $(mobileBlockHeader).append('<div class="mobile-block_close">Закрыть</div>');
          mobileMenuTop.addClass('site-header_menu_top_mobile').appendTo($(this.$mobileBlock));
          mobileMenuBottom.addClass('site-header_menu_bottom_mobile').appendTo($(this.$mobileBlock));
        }
      },
      leftMenu: {
        init: function init() {
          $('.site-menu_left').find('li').each(function () {
            if ($(this).children('ul').length) {
              $(this).addClass('has-child').children('a').after('<span class="icon-arrow-down-small site-menu_left_arrow"></span>');
            }
          });

          $(document).on('click', '.site-menu_left_arrow', function () {
            $(this).next('ul').slideToggle(400).parent('li').toggleClass('open-submenu');
          });
        }
      }
    },
    toTopBtn: {
      init: function init() {
        var $topBtn = $('.site-btn_top');
        $topBtn.hide();

        window.addEventListener('scroll', function () {
          var scrollTop = $(window).scrollTop();

          if (scrollTop > 400) {
            $topBtn.fadeIn();
          } else {
            $topBtn.fadeOut();
          }
        });

        $topBtn.on('click', function () {
          $('body,html').animate({
            scrollTop: 0
          }, 500);
          return false;
        });
      }
    },
    langChoice: {
      init: function init() {
        var langBlock = '.site-header_lang',
            currentLang = '.site-header_lang_item_current',
            langList = '.site-header_lang_list',
            langItem = '.site-header_lang_item_list';

        $(document).on('click', currentLang, function () {
          $(this).siblings(langList).toggleClass('site-header_lang_list_visible');
        });

        $(document).on('click', langItem, function () {
          var flagImgSrc = $(this).find('.site-header_lang_item_flag').find('img').prop('src');
          var langName = $(this).find('.site-header_lang_item_name').text();

          $(currentLang).find('.site-header_lang_item_flag').find('img').prop('src', flagImgSrc);
          $(currentLang).find('.site-header_lang_item_name').text(langName);

          $(this).closest(langList).removeClass('site-header_lang_list_visible');
        });
      }
    },
    siteForm: {
      init: function init() {
        this.siteFormHint();
        this.submitForms();
        this.phoneMask();
      },
      siteFormHint: function siteFormHint() {
        var siteFormInputs = $('.site-form').find('.site-form_item_input, .site-form_item_textarea');
        this.isInputEmpty(siteFormInputs);

        $('.site-form_item_input, .site-form_item_textarea').on('focusout', function () {
          dhl.plugins.siteForm.isInputEmpty($(this));
        });
      },
      isInputEmpty: function isInputEmpty(inputs) {
        inputs.each(function () {
          if ($(this).val()) {
            $(this).addClass('noempty');
          } else {
            if ($(this).hasClass('noempty')) {
              $(this).removeClass('noempty');
            }
          }
        });
      },
      submitForms: function submitForms() {
        var submitBtn = '.site-form_submit';

        $(document).on('click', submitBtn, function (e) {
          e.preventDefault();
          var form = $(this).closest('form'),
              submitInput = form.find('[type="submit"]');

          if (form[0].checkValidity()) {
            form.submit();
          } else {
            submitInput.click();
          }
        });
      },
      phoneMask: function phoneMask() {
        $("input[type='tel']").mask("+7 (999) 999-9999");
      }
    }
  },
  pages: {
    indexPage: {
      init: function init() {
        this.profitSlider();
      },
      profitSlider: function profitSlider() {
        var profitSlider = $('.main-profit_slider').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [{
            breakpoint: 1025,
            settings: {
              arrows: false,
              dots: true,
              infinite: false
            }
          }, {
            breakpoint: 769,
            settings: {
              arrows: false,
              dots: true,
              slidesToShow: 2,
              infinite: false
            }
          }, {
            breakpoint: 499,
            settings: {
              arrows: false,
              dots: true,
              slidesToShow: 1,
              infinite: false
            }
          }]
        });
      }
    },
    destinationsPage: {
      init: function init() {
        var linksList = '.destination_list',
            hiddenLinksCount = $(linksList).children('a:hidden').length,
            visibleLinksCount = $(linksList).children('a:visible').length + 1,
            hideText = 'Скрыть',
            showText = 'Показать все';

        this.destinationLinksVisibibility();

        $(window).on('hresize', function () {
          dhl.pages.destinationsPage.destinationLinksVisibibility();
        });

        $(document).on('click', '.destination_list_btn', function () {
          if (!$(this).hasClass('destination_list_btn_hide')) {
            $(this).addClass('destination_list_btn_hide').text(hideText).prev(linksList).children('a:hidden').show(400);
          } else {
            $(this).removeClass('destination_list_btn_hide').text(showText).prev(linksList).children('a:nth-child(n+' + visibleLinksCount + ')').hide(400);
          }
        });
      },
      destinationLinksVisibibility: function destinationLinksVisibibility() {
        var linksList = '.destination_list',
            hiddenLinksCount = $(linksList).children('a:hidden').length,
            visibleLinksCount = $(linksList).children('a:visible').length + 1,
            hideText = 'Скрыть',
            showText = 'Показать все';

        if (hiddenLinksCount) {
          if (!$(linksList).next('.destination_list_btn').length) {
            $(linksList).after('<div class="destination_list_btn">' + showText + '</div>');
          }
        } else {
          $(linksList).children('a').css('display', '');
          $(linksList).next('.destination_list_btn').remove();
        }
      }
    },
    trackingPage: {
      init: function init() {
        this.trackingSpaceOpen();
      },
      trackingSpaceOpen: function trackingSpaceOpen() {
        var btn = '.tracking_info_space_btn',
            spaceBlock = '.tracking_info_space',
            spaceValue = '.tracking_info_space_value';

        $(document).on('click', btn, function () {
          $(this).closest(spaceBlock).toggleClass('tracking_info_space_open').find(spaceValue).slideToggle(400);
        });
      }
    },
    usefulPage: {
      init: function init() {
        this.usefulItemOpen();
        this.usefulTabs();
      },
      usefulItemOpen: function usefulItemOpen() {
        var btn = '.useful-info_item_btn',
            usefulBlock = '.useful-info_item',
            usefulValue = '.useful-info_item_value';

        $(document).on('click', btn, function () {
          $(this).closest(usefulBlock).toggleClass('useful-info_item_open').find(usefulValue).slideToggle(400);
        });
      },
      usefulTabs: function usefulTabs() {
        var container = '.useful-info_tabs',
            tabItems = '.useful-info_tabs_links',
            tabContent = '.useful-info_tabs_content';

        $(tabItems).on('click', 'span:not(.active)', function () {
          var activeIndex = $(this).index();

          $(this).addClass('active').siblings('span').removeClass('active').closest(container).find(tabContent).removeClass('active').eq(activeIndex).addClass('active');
        });
      }
    }
  }
};

window.addEventListener('DOMContentLoaded', function () {
  dhl.init();
  // $(document).foundation();
});