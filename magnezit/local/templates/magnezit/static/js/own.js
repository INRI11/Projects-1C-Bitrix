"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

$(function () {
  window.magnezit = {};
  window.magnezit.obj = {
    anim: function anim() {
      var elemsAnimArr = ['.sections__item'];

      function visChecker(el) {
        var rect = el.getBoundingClientRect();
        var wHeight = window.innerHeight || document.documentElement.clientHeight;
        return rect.top <= wHeight * 0.8;
      }

      function elemVisCheck(elArray) {
        $(window).on('scroll', function () {
          if ($(elArray).length) {
            $(elArray).each(function (index, item) {
              if ($(item).length) {
                $(item).each(function (index2, elem) {
                  if (visChecker(elem)) $(elem).addClass('start-animate');
                });
              }
            });
          }
        });
      }

      if (elemsAnimArr.length) elemVisCheck(elemsAnimArr);
    },
    digits: function digits() {
      $('.js-digits').on('keydown', function (e) {
        var validArr = [46, 8, 9, 27, 13, 110, 190];

        if (validArr.indexOf(e.keyCode) !== -1 || e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true) || e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true) || e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true) || e.keyCode >= 35 && e.keyCode <= 39) {
          return;
        }

        if ((e.shiftKey || e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
    },
    chekEmptyFields: function chekEmptyFields() {
      var fields = $('.calculations__calc-field-input, .search-form__input');
      fields.each(function () {
        var _t = $(this);

        _t.val().trim() === '' ? _t.removeClass('not-empty') : _t.addClass('not-empty').removeClass('error');
      });
      fields.on('blur keyup', function () {
        var _t = $(this);

        setTimeout(function () {
          _t.val().trim() === '' ? _t.removeClass('not-empty') : _t.addClass('not-empty').removeClass('error');
        }, 50);
      });
    },
    select: function select() {
      $('.js-select').select2({
        minimumResultsForSearch: -1
      }); // if ($('.js-select').length) {
      //   $('select.js-select').each(function (index, item) {
      //     new Choices($(item)[0], {
      //       placeholder: true,
      //       searchEnabled: false,
      //       itemSelectText: '',
      //       classNames: {
      //         containerOuter: 'choices choices--custom',
      //       }
      //     });
      //   });
      // };
    },
    init: function init() {
      var _self = this;

      function chekErorFields(fieldsArray) {
        var checkResult = true;
        $.each(fieldsArray, function (i, currProgram) {
          $.each(currProgram, function (key, item) {
            if ($(item).val().trim() === '') {
              $(item).addClass('error');
            } else {
              $(item).removeClass('error');
            }

            if ($(item).hasClass('error')) checkResult = false;
          });
        });
        return checkResult;
      }

      this.anim();
      if ($('.js-digits').length) this.digits();
      if ($('.js-select').length) this.select();

      if ($('.js-close-popup').length) {
        $('.js-close-popup').on('click', function () {
          $(this).parents('.popup').fadeOut(350);
          return false;
        });
      }

      if ($('.js-lightGallery').length) {
        $('.js-lightGallery').lightGallery({
          selector: 'a',
          share: false,
          actualSize: false,
          autoplayControls: false,
          download: false,
          fullScreen: false
        });
      }

      if ($('.calculations__calc-field-input, .search-form__input').length) this.chekEmptyFields();

      if ($('.js-toggle-search').length && $('.header__search').length) {
        var toggleSearch = $('.js-toggle-search'),
            headerSearch = $('.header__search');
        toggleSearch.on('click', function () {
          $(this).toggleClass('active');
          headerSearch.fadeToggle(350);
          return false;
        });
      }

      if ($('.tabs__controls-button').length && $('.tabs__item').length) {
        var tabsBtns = $('.tabs__controls-button'),
            tabsBtnDescr = $('.tabs__controls-descr'),
            tabsItems = $('.tabs__item'),
            blockedChangeTabs = false;
        tabsBtns.on('click', function () {
          var _t = $(this),
              _tData = _t.data('tabs-btn');

          if (!_t.hasClass('tabs__controls-button--active') && !blockedChangeTabs) {
            blockedChangeTabs = true;

            if ($('.tabs__item[data-tabs-item="' + _tData + '"]').length) {
              tabsBtns.removeClass('tabs__controls-button--active');
              tabsBtnDescr.slideUp(350);

              _t.addClass('tabs__controls-button--active');

              if (_t.siblings('.tabs__controls-descr').length) {
                _t.siblings('.tabs__controls-descr').slideDown(350);
              }

              tabsItems.fadeOut(350);
              setTimeout(function () {
                $('.tabs__item[data-tabs-item="' + _tData + '"]').fadeIn(350, function () {
                  blockedChangeTabs = false;
                });
              }, 350);
            }
          }

          return false;
        });
      }

      if ($('.calculations__tabs-controls-btn').length && $('.calculations__tabs-item').length) {
        var tabsBtns = $('.calculations__tabs-controls-btn'),
            tabsItems = $('.calculations__tabs-item'),
            blockedChangeTabs = false;
        tabsBtns.on('click', function () {
          var _t = $(this),
              _tData = _t.data('tabs-btn');

          if (!_t.hasClass('calculations__tabs-controls-btn--active') && !blockedChangeTabs) {
            blockedChangeTabs = true;

            if ($('.calculations__tabs-item[data-tabs-item="' + _tData + '"]').length) {
              tabsBtns.removeClass('calculations__tabs-controls-btn--active');
              tabsItems.fadeOut(350);

              _t.addClass('calculations__tabs-controls-btn--active');

              setTimeout(function () {
                $('.calculations__tabs-item[data-tabs-item="' + _tData + '"]').fadeIn(350, function () {
                  blockedChangeTabs = false;
                });
              }, 300);
            }
          }

          return false;
        });
      }

      if ($('.js-calc1').length) {
        var calc1 = $('.js-calc1'),
            calc1ParL = calc1.find('.calc1-par-l'),
            calc1ParT1 = calc1.find('.calc1-par-t1'),
            calc1ParT2 = calc1.find('.calc1-par-t2'),
            calc1ParAlfa = calc1.find('.calc1-par-alfa'),
            calc1Result = calc1.find('.calculations__calc-result'),
            calc1Btn = calc1.find('.calculations__calc-btn'),
            result = 0;
        calc1Btn.on('click', function () {
          if (!calc1ParL.length && !calc1ParT1.length && !calc1ParT2.length && !calc1ParAlfa.length) {
            if (calc1Result.length) {
              calc1Result.removeClass('show');
            }
          } else {
            if (chekErorFields([calc1ParL, calc1ParT1, calc1ParT2, calc1ParAlfa])) {
              result = (parseFloat(calc1ParL.val()) * (parseFloat(calc1ParT1.val()) - parseFloat(calc1ParT2.val())) * parseFloat(calc1ParAlfa.val()) * (1 / Math.pow(10, 6))).toFixed(3);
              calc1Result.find('span').text(result);
              calc1Result.addClass('show');
            }
          }

          return false;
        });
      }

      if ($('.js-calc2').length) {
        var calc2 = $('.js-calc2'),
            calc2ParL = calc2.find('.calc2-par-l'),
            calc2ParT1 = calc2.find('.calc2-par-t1'),
            calc2ParT2 = calc2.find('.calc2-par-t2'),
            calc2ParAlfa = calc2.find('.calc2-par-alfa'),
            calc2Result = calc2.find('.calculations__calc-result'),
            calc2Btn = calc2.find('.calculations__calc-btn');
        calc2Btn.on('click', function () {
          var result2 = 0;

          if (!calc2ParL.length && !calc2ParT1.length && !calc2ParT2.length && !calc2ParAlfa.length) {
            if (calc2Result.length) {
              calc2Result.removeClass('show');
            }
          } else {
            if (chekErorFields([calc2ParL, calc2ParT1, calc2ParT2, calc2ParAlfa])) {
              result2 = (parseFloat(calc2ParL.val()) * (parseFloat(calc2ParT1.val()) - parseFloat(calc2ParT2.val())) * parseFloat(calc2ParAlfa.val()) * (1 / Math.pow(10, 6))).toFixed(3);
              calc2Result.find('span').text(result2);
              calc2Result.addClass('show');
            }
          }

          return false;
        });
      }

      if ($('.js-calc3').length && typeof window.calc3Data !== 'undefined') {
        var calc3Data = window.calc3Data,
            calc3 = $('.js-calc3'),
            calc3Btn = calc3.find('.calculations__calc-btn'),
            calc3Select = calc3.find('.calc3-select'),
            calc3ParT = calc3.find('.calc3-par-t'),
            calc3Result = calc3.find('.calculations__calc-result');
        calc3Btn.on('click', function () {
          var calc3ParA = 1,
              calc3ParB = 1,
              calc3ParD = 1,
              result3 = 0;

          if (!calc3ParT.length && !calc3Select.length) {
            calc3Result.removeClass('show');
          } else {
            if (chekErorFields([calc3ParT])) {
              $.each(calc3Data, function (index, item) {
                if (item.metal === calc3Select.val()) {
                  calc3ParA = item.par_A;
                  calc3ParB = item.par_B;
                  calc3ParD = item.par_D;
                }
              });
              result3 = parseInt(calc3ParA) + parseInt(calc3ParB) * (273 + parseInt(calc3ParT.val())) + parseInt(calc3ParD) * Math.pow(273 + parseInt(calc3ParT.val()), 2);
              calc3Result.find('span').text(result3);
              calc3Result.addClass('show');
            }
          }

          return false;
        });
      }

      if ($('.js-calc4').length && typeof window.calc4Data !== 'undefined') {
        var calc3Data = window.calc3Data,
            calc4 = $('.js-calc4'),
            calc4Btn = calc4.find('.calculations__calc-btn'),
            calc4Select = calc4.find('.calc4-select'),
            calc4ParT = calc4.find('.calc4-par-t'),
            calc4Result = calc4.find('.calculations__calc-result');
        calc4Btn.on('click', function () {
          var calc4CoefficientParA = 0,
              calc4CoefficientParB = 0,
              calc4HeatCapacityParA = 0,
              calc4HeatCapacityParB = 0,
              calc4Density = '',
              result41 = 0,
              result42 = 0;

          if (!calc4ParT.length && !calc4Select.length) {
            calc4Result.removeClass('show');
          } else {
            if (chekErorFields([calc4ParT])) {
              $.each(calc4Data, function (index, item) {
                if (item.material === calc4Select.val()) {
                  if (typeof item.coefficient !== 'undefined' && _typeof(item.coefficient) === "object") {
                    calc4CoefficientParA = parseFloat(item.coefficient.par_A);
                    calc4CoefficientParB = parseFloat(item.coefficient.par_B);
                  }

                  if (typeof item.heatCapacity !== 'undefined' && _typeof(item.heatCapacity) === "object") {
                    calc4HeatCapacityParA = parseFloat(item.heatCapacity.par_A);
                    calc4HeatCapacityParB = parseFloat(item.heatCapacity.par_B);
                  }

                  if (item.density) {
                    calc4Density = item.density;
                  }
                }
              });
              result41 = (calc4CoefficientParA + calc4CoefficientParB * parseInt(calc4ParT.val())).toFixed(3);
              result42 = (calc4HeatCapacityParA + calc4HeatCapacityParB * parseInt(calc4ParT.val())).toFixed(1);

              if (calc4Result.hasClass('coefficient')) {
                if (result41 !== '0.000') {
                  calc4Result.find('span.coefficient__value').text(result41);
                } else {
                  calc4Result.find('span.coefficient__value').text('-');
                }
              }

              if (calc4Result.hasClass('heatCapacity')) {
                if (result42 !== '0.0') {
                  calc4Result.find('span.heatCapacity__value').text(result42);
                } else {
                  calc4Result.find('span.heatCapacity__value').text('-');
                }
              }

              if (calc4Result.hasClass('density')) {
                if (calc4Density !== '') {
                  calc4Result.find('span.density__value').text(calc4Density);
                } else {
                  calc4Result.find('span.density__value').text('-');
                }
              }

              calc4Result.addClass('show');
            }
          }

          return false;
        });
      }

      if ($('.js-calc5').length && typeof window.calc5Data !== 'undefined') {
        var calc5Data = window.calc5Data,
            calc5 = $('.js-calc5'),
            calc5Btn = calc5.find('.calculations__calc-btn'),
            calc5Select = calc5.find('.calc5-select'),
            calc5ParT = calc5.find('.calc5-par-t'),
            calc5Result = calc5.find('.calculations__calc-result');
        calc5Btn.on('click', function () {
          var result5 = 0;

          if (!calc5ParT.length && !calc5Select.length) {
            calc5Result.removeClass('show');
          } else {
            if (chekErorFields([calc5ParT])) {
              $.each(calc5Data, function (index, item) {
                if (item.metal === calc5Select.val()) {
                  var tempArr = [];
                  item.params.filter(function (v) {
                    if (v.temp >= parseInt(calc5ParT.val())) {
                      tempArr.push(v.temp);
                    }
                  });

                  if (tempArr.length) {
                    $.each(item.params, function (indexParams, params) {
                      if (params.temp === Math.min.apply(Math, tempArr)) {
                        result5 = params.coef;
                      }
                    });
                  } else {
                    result5 = item.params[item.params.length - 1].coef;
                  }
                }
              });
              calc5Result.find('span').text(result5);
              calc5Result.addClass('show');
            }
          }

          return false;
        });
      }

      if ($('.js-calc6').length && typeof window.calc6Data !== 'undefined') {
        var calc6Data = window.calc6Data,
            calc6 = $('.js-calc6'),
            calc6Btn = calc6.find('.calculations__calc-btn'),
            calc6Select = calc6.find('.calc6-select'),
            calc6ParT = calc6.find('.calc6-par-t'),
            calc6Result = calc6.find('.calculations__calc-result');
        calc6Btn.on('click', function () {
          var result6 = 0;

          if (!calc6ParT.length && !calc6Select.length) {
            calc6Result.removeClass('show');
          } else {
            if (chekErorFields([calc6ParT])) {
              $.each(calc6Data, function (index, item) {
                if (item.material === calc6Select.val()) {
                  var tempArr = [];
                  item.bend.filter(function (v) {
                    if (v.temp >= parseInt(calc6ParT.val())) {
                      tempArr.push(v.temp);
                    }
                  });

                  if (tempArr.length) {
                    $.each(item.bend, function (indexParams, params) {
                      if (params.temp === Math.min.apply(Math, tempArr)) {
                        result6 = params.coef;
                      }
                    });
                  } else {
                    result6 = item.bend[item.bend.length - 1].coef;
                  }
                }
              });
              calc6Result.find('span').text(result6);
              calc6Result.addClass('show');
            }
          }

          return false;
        });
      }

      if ($('.js-calc7').length && typeof window.calc6Data !== 'undefined') {
        var calc6Data = window.calc6Data,
            calc7 = $('.js-calc7'),
            calc7Btn = calc7.find('.calculations__calc-btn'),
            calc7Select = calc7.find('.calc7-select'),
            calc7Result = calc7.find('.calculations__calc-result');
        calc7Btn.on('click', function () {
          var result7 = 0;

          if (!calc7Select.length) {
            calc7Result.removeClass('show');
          } else {
            $.each(calc6Data, function (index, item) {
              if (item.material === calc7Select.val()) {
                result7 = item.compression;
              }
            });
            calc7Result.find('span').text(result7);
            calc7Result.addClass('show');
          }

          return false;
        });
      }

      if ($('.js-calc8').length && typeof window.calc8Data !== 'undefined') {
        var calc8Data = window.calc8Data,
            calc8 = $('.js-calc8'),
            calc8ParD = calc8.find('.calc8-par-d'),
            calc8ParCorner = calc8.find('.calc8-par-corner'),
            calc8ParL = calc8.find('.calc8-par-l'),
            calc8ParOutside = calc8.find('.calc8-par-outside'),
            calc8ParInside = calc8.find('.calc8-par-inside'),
            calc8ParOutside2 = calc8.find('.calc8-par-outside2'),
            calc8ParInside2 = calc8.find('.calc8-par-inside2'),
            calc8SelectGrade = calc8.find('.calc8-select-grade'),
            calc8SelectGrade2 = calc8.find('.calc8-select-grade2'),
            calc8ParlGrade = calc8.find('.calc8-par-l-grade'),
            calc8ParlGrade2 = calc8.find('.calc8-par-l-grade2'),
            calc8Result = calc8.find('.calculations__calc-result'),
            calc8Btn = calc8.find('.calculations__calc-btn'),
            result8 = 0,
            result9 = 0,
            calc8Warning = calc8.find('.calculations__calc-warning');
        calc8SelectGrade.on('change', function () {
          var _t = $(this),
              parent = _t.parents('.calculations__calc-row'),
              parSOutside = parent.find('.calc8-par-outside'),
              parSInside = parent.find('.calc8-par-inside'),
              parLGrade = parent.find('.calc8-par-l-grade');

          $.each(calc8Data, function (index, item) {
            if (item.grade === _t.val()) {
              parSOutside.val(item.par_s_outs);
              parSInside.val(item.par_s_ins);
              parLGrade.val(item.par_l);

              _self.chekEmptyFields();
            }
          });
        });
        calc8SelectGrade2.on('change', function () {
          var _t = $(this),
              parent2 = _t.parents('.calculations__calc-row'),
              parSOutside2 = parent2.find('.calc8-par-outside2'),
              parSInside2 = parent2.find('.calc8-par-inside2'),
              parLGrade2 = parent2.find('.calc8-par-l-grade2');

          $.each(calc8Data, function (index, item) {
            if (item.grade === _t.val()) {
              parSOutside2.val(item.par_s_outs);
              parSInside2.val(item.par_s_ins);
              parLGrade2.val(item.par_l);

              _self.chekEmptyFields();
            }
          });
        });
        calc8Btn.on('click', function () {
          if (!calc8ParD.length && !calc8ParCorner.length && !calc8ParL.length && !calc8ParOutside.length && !calc8ParInside.length && !calc8ParOutside2.length && !calc8ParInside2.length) {
            if (calc8Result.length) {
              calc8Result.removeClass('show');
            }
          } else {
            if (chekErorFields([calc8ParD, calc8ParCorner, calc8ParL, calc8ParOutside, calc8ParInside, calc8ParOutside2, calc8ParInside2])) {
              if (calc8ParlGrade.val() === calc8ParlGrade2.val()) {
                if (!calc8Warning.hasClass('hide')) calc8Warning.addClass('hide'); // М1 = (3.14 * (D*SвнутрМ2 - (D - 2*L)*SвнешМ2) / (SвнешМ1*SвнутрМ2 - SвнутрМ1*SвнешМ2)) * (Угол/360)

                result8 = parseFloat(3.14 * (parseInt(calc8ParD.val()) * parseFloat(calc8ParInside2.val()).toFixed(1) - (parseInt(calc8ParD.val()) - 2 * parseInt(calc8ParL.val())) * parseFloat(calc8ParOutside2.val()).toFixed(1)) / (parseFloat(calc8ParOutside.val()).toFixed(1) * parseFloat(calc8ParInside2.val()).toFixed(1) - parseFloat(calc8ParInside.val()).toFixed(1) * parseFloat(calc8ParOutside2.val()).toFixed(1)) * (parseInt(calc8ParCorner.val()) / 360)).toFixed(0); // М2 = (3.14 * ((D - 2*L)*SвнешМ1 - D*SвнутрМ1) / (SвнешМ1*SвнутрМ2 - SвнутрМ1*SвнешМ2)) * (Угол/360)

                result9 = parseFloat(3.14 * ((parseInt(calc8ParD.val()) - 2 * parseInt(calc8ParL.val())) * parseFloat(calc8ParOutside.val()).toFixed(1) - parseInt(calc8ParD.val()) * parseFloat(calc8ParInside.val()).toFixed(1)) / (parseFloat(calc8ParOutside.val()).toFixed(1) * parseFloat(calc8ParInside2.val()).toFixed(1) - parseFloat(calc8ParInside.val()).toFixed(1) * parseFloat(calc8ParOutside2.val()).toFixed(1)) * (parseInt(calc8ParCorner.val()) / 360)).toFixed(0);

                if (calc8Result.hasClass('grade')) {
                  if (result8 !== 0) {
                    calc8Result.find('span.grade__value').text(result8);
                  } else {
                    calc8Result.find('span.grade__value').text('-');
                  }
                }

                if (calc8Result.hasClass('grade2')) {
                  if (result9 !== 0) {
                    calc8Result.find('span.grade2__value').text(result9);
                  } else {
                    calc8Result.find('span.grade2__value').text('-');
                  }
                }

                calc8Result.addClass('show');
              } else {
                if (calc8Warning.hasClass('hide')) calc8Warning.removeClass('hide');
              }
            }
          }

          return false;
        });
      }

      if ($('.js-calc10').length && window.calc10Data !== 'undefined') {
        var fillingLayerParameters = function fillingLayerParameters() {
          calc10.find('.calculations__calc-row--layer').each(function (index, item) {
            var itemLayerSelect = $(item).find('.calculations__calc-field-select'),
                itemLayerParA = $(item).find('.calc10-par-a'),
                itemLayerParB = $(item).find('.calc10-par-b');
            itemLayerSelect.on('change', function () {
              var _t = $(this);

              $.each(calc10Data, function (index2, item2) {
                if (item2.material === _t.val()) {
                  itemLayerParA.val(item2.par_A);
                  if (itemLayerParB.val() === '') itemLayerParB.val(item2.par_B);

                  if (itemLayerParA.val() !== '') {
                    itemLayerParA.addClass('not-empty').removeClass('error');
                  }

                  if (itemLayerParB.val() !== '') {
                    itemLayerParB.addClass('not-empty').removeClass('error');
                  }
                } else {
                  if (itemLayerParA.val() === '') itemLayerParA.removeClass('not-empty');
                  if (itemLayerParB.val() === '') itemLayerParB.removeClass('not-empty');
                }
              });
            });
          });
        };

        var summLayers = function summLayers() {
          var sumAllLayers = 0;
          calc10.find('.calculations__calc-row--layer').each(function (index, item) {
            var _t = $(this),
                sumItemLayer = 0;

            sumItemLayer = parseFloat(_t.find('.calc10-par-thickness').val()).toFixed(3) / parseFloat(_t.find('.calc10-par-a').val()).toFixed(3) + 1 / parseFloat(calc10ParCoeff.val()).toFixed(3);
            console.log(sumItemLayer);
            sumAllLayers = sumAllLayers + sumItemLayer;
          });
          return sumAllLayers.toFixed(3);
        };

        var calc10Data = window.calc10Data,
            calc10 = $('.js-calc10'),
            calc10ParT1 = calc10.find('.calc10-par-t1'),
            calc10ParT2 = calc10.find('.calc10-par-t2'),
            calc10ParCoeff = calc10.find('.calc10-par-coeff'),
            calc10ParA = calc10.find('.calc10-par-a'),
            calc10ParB = calc10.find('.calc10-par-b'),
            calc10ParThickness = calc10.find('.calc10-par-thickness'),
            calc10layers = calc10.find('.calculations__calc-layers'),
            calc10BtnAddLayer = calc10.find('.calculations__calc-btn--add-layer'),
            calc10Btn = calc10.find('.calculations__calc-btn:not(.calculations__calc-btn--add-layer)'),
            calc10Result = calc10.find('.calculations__calc-result'),
            result10 = 0,
            result11 = 0,
            countLayers = 1;
        fillingLayerParameters();
        calc10BtnAddLayer.on('click', function () {
          countLayers += 1;

          if (countLayers < 7) {
            var layers = calc10layers.find('.calculations__calc-row--layer');
            layers.find('select').select2('destroy');
            var clone = layers.first().clone().addClass('clone');
            clone.find('.calculations__calc-row-title span').text(countLayers);
            clone.find('.calc10-par-a').val('').removeClass('not-empty');
            clone.find('.calc10-par-thickness').val('').removeClass('not-empty');
            clone.find('.calc10-par-b').val('300').addClass('not-empty');
            calc10layers.append(clone);

            _self.select();

            _self.digits();

            _self.chekEmptyFields();

            fillingLayerParameters();
            if (countLayers === 6) $(this).fadeOut(350);
          }

          return false;
        });
        calc10Btn.on('click', function () {
          if (!calc10ParT1.length && !calc10ParT2.length && !calc10ParCoeff.length && !calc10ParA.length && !calc10ParB.length && !calc10ParThickness.length) {
            if (calc10Result.length) {
              calc10Result.removeClass('show');
            }
          } else {
            if (chekErorFields([calc10.find('.calculations__calc-field-input')])) {
              result10 = parseFloat((parseInt(calc10ParT1.val()) - parseInt(calc10ParT2.val())) / summLayers()).toFixed(3);
              result11 = parseFloat(parseInt(calc10ParT2.val()) - result10 / parseFloat(calc10ParCoeff.val()).toFixed(3)).toFixed(3);

              if (calc10Result.hasClass('flow')) {
                if (result10 !== 0) {
                  calc10Result.find('span.flow__value').text(result10);
                } else {
                  calc10Result.find('span.flow__value').text('-');
                }
              }

              if (calc10Result.hasClass('temp')) {
                if (result11 !== 0) {
                  calc10Result.find('span.temp__value').text(result11);
                } else {
                  calc10Result.find('span.temp__value').text('-');
                }
              }

              calc10Result.addClass('show');
            }
          }

          return false;
        });
      }

      $(window).trigger('scroll');
    }
  }.init();
});
//# sourceMappingURL=own.js.map
