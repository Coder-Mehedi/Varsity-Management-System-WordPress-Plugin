/**
 * Zabuto Calendar
 *
 * Dependencies
 * - jQuery (2.0.3)
 * - Twitter Bootstrap (3.0.2)
 */

if (typeof jQuery == 'undefined') {
    throw new Error('jQuery is not loaded');
}

/**
 * Create calendar
 *
 * @param options
 * @returns {*}
 */
jQuery.fn.zabuto_calendar = function (options) {
    var opts = jQuery.extend({}, jQuery.fn.zabuto_calendar_defaults(), options);
    var languageSettings = jQuery.fn.zabuto_calendar_language(opts.language);
    opts = jQuery.extend({}, opts, languageSettings);

    this.each(function () {
        var jQuerycalendarElement = jQuery(this);
        jQuerycalendarElement.attr('id', "zabuto_calendar_" + Math.floor(Math.random() * 99999).toString(36));

        jQuerycalendarElement.data('initYear', opts.year);
        jQuerycalendarElement.data('initMonth', opts.month);
        jQuerycalendarElement.data('monthLabels', opts.month_labels);
        jQuerycalendarElement.data('weekStartsOn', opts.weekstartson);
        jQuerycalendarElement.data('navIcons', opts.nav_icon);
        jQuerycalendarElement.data('dowLabels', opts.dow_labels);
        jQuerycalendarElement.data('showToday', opts.today);
        jQuerycalendarElement.data('showDays', opts.show_days);
        jQuerycalendarElement.data('showPrevious', opts.show_previous);
        jQuerycalendarElement.data('showNext', opts.show_next);
        jQuerycalendarElement.data('cellBorder', opts.cell_border);
        jQuerycalendarElement.data('ajaxSettings', opts.ajax);
        jQuerycalendarElement.data('legendList', opts.legend);
        jQuerycalendarElement.data('actionFunction', opts.action);
        jQuerycalendarElement.data('actionNavFunction', opts.action_nav);

        drawCalendar();

        function drawCalendar() {
            var dateInitYear = parseInt(jQuerycalendarElement.data('initYear'));
            var dateInitMonth = parseInt(jQuerycalendarElement.data('initMonth')) - 1;
            var dateInitObj = new Date(dateInitYear, dateInitMonth, 1, 0, 0, 0, 0);
            jQuerycalendarElement.data('initDate', dateInitObj);

            var tableClassHtml = (jQuerycalendarElement.data('cellBorder') === true) ? ' table-bordered' : '';

            jQuerytableObj = jQuery('<table class="table' + tableClassHtml + '"></table>');
            jQuerytableObj = drawTable(jQuerycalendarElement, jQuerytableObj, dateInitObj.getFullYear(), dateInitObj.getMonth());

            jQuerylegendObj = drawLegend(jQuerycalendarElement);

            var jQuerycontainerHtml = jQuery('<div class="zabuto_calendar" id="' + jQuerycalendarElement.attr('id') + '"></div>');
            jQuerycontainerHtml.append(jQuerytableObj);
            jQuerycontainerHtml.append(jQuerylegendObj);

            jQuerycalendarElement.append(jQuerycontainerHtml);
        }

        function drawTable(jQuerycalendarElement, jQuerytableObj, year, month) {
            var dateCurrObj = new Date(year, month, 1, 0, 0, 0, 0);
            jQuerycalendarElement.data('currDate', dateCurrObj);

            jQuerytableObj.empty();
            jQuerytableObj = appendMonthHeader(jQuerycalendarElement, jQuerytableObj, year, month);
            jQuerytableObj = appendDayOfWeekHeader(jQuerycalendarElement, jQuerytableObj);
            jQuerytableObj = appendDaysOfMonth(jQuerycalendarElement, jQuerytableObj, year, month);
            checkEvents(jQuerycalendarElement, year, month);
            return jQuerytableObj;
        }

        function drawLegend(jQuerycalendarElement) {
            var jQuerylegendObj = jQuery('<div class="legend" id="' + jQuerycalendarElement.attr('id') + '_legend"></div>');
            var legend = jQuerycalendarElement.data('legendList');
            if (typeof(legend) == 'object' && legend.length > 0) {
                jQuery(legend).each(function (index, item) {
                    if (typeof(item) == 'object') {
                        if ('type' in item) {
                            var itemLabel = '';
                            if ('label' in item) {
                                itemLabel = item.label;
                            }

                            switch (item.type) {
                                case 'text':
                                    if (itemLabel !== '') {
                                        var itemBadge = '';
                                        if ('badge' in item) {
                                            if (typeof(item.classname) === 'undefined') {
                                                var badgeClassName = 'badge-event';
                                            } else {
                                                var badgeClassName = item.classname;
                                            }
                                            itemBadge = '<span class="badge ' + badgeClassName + '">' + item.badge + '</span> ';
                                        }
                                        jQuerylegendObj.append('<span class="legend-' + item.type + '">' + itemBadge + itemLabel + '</span>');
                                    }
                                    break;
                                case 'block':
                                    if (itemLabel !== '') {
                                        itemLabel = '<span>' + itemLabel + '</span>';
                                    }
                                    if (typeof(item.classname) === 'undefined') {
                                        var listClassName = 'event';
                                    } else {
                                        var listClassName = 'event-styled ' + item.classname;
                                    }
                                    jQuerylegendObj.append('<span class="legend-' + item.type + '"><ul class="legend"><li class="' + listClassName + '"></li></u>' + itemLabel + '</span>');
                                    break;
                                case 'list':
                                    if ('list' in item && typeof(item.list) == 'object' && item.list.length > 0) {
                                        var jQuerylegendUl = jQuery('<ul class="legend"></u>');
                                        jQuery(item.list).each(function (listIndex, listClassName) {
                                            jQuerylegendUl.append('<li class="' + listClassName + '"></li>');
                                        });
                                        jQuerylegendObj.append(jQuerylegendUl);
                                    }
                                    break;
                                case 'spacer':
                                    jQuerylegendObj.append('<span class="legend-' + item.type + '"> </span>');
                                    break;

                            }
                        }
                    }
                });
            }

            return jQuerylegendObj;
        }

        function appendMonthHeader(jQuerycalendarElement, jQuerytableObj, year, month) {
            var navIcons = jQuerycalendarElement.data('navIcons');
            var jQueryprevMonthNavIcon = jQuery('<span><span class="fa fa-chevron-left text-transparent"></span></span>');
            var jQuerynextMonthNavIcon = jQuery('<span><span class="fa fa-chevron-right text-transparent"></span></span>');
            if (typeof(navIcons) === 'object') {
                if ('prev' in navIcons) {
                    jQueryprevMonthNavIcon.html(navIcons.prev);
                }
                if ('next' in navIcons) {
                    jQuerynextMonthNavIcon.html(navIcons.next);
                }
            }

            var prevIsValid = jQuerycalendarElement.data('showPrevious');
            if (typeof(prevIsValid) === 'number' || prevIsValid === false) {
                prevIsValid = checkMonthLimit(jQuerycalendarElement.data('showPrevious'), true);
            }

            var jQueryprevMonthNav = jQuery('<div class="calendar-month-navigation"></div>');
            jQueryprevMonthNav.attr('id', jQuerycalendarElement.attr('id') + '_nav-prev');
            jQueryprevMonthNav.data('navigation', 'prev');
            if (prevIsValid !== false) {
                prevMonth = (month - 1);
                prevYear = year;
                if (prevMonth == -1) {
                    prevYear = (prevYear - 1);
                    prevMonth = 11;
                }
                jQueryprevMonthNav.data('to', {year: prevYear, month: (prevMonth + 1)});
                jQueryprevMonthNav.append(jQueryprevMonthNavIcon);
                if (typeof(jQuerycalendarElement.data('actionNavFunction')) === 'function') {
                    jQueryprevMonthNav.click(jQuerycalendarElement.data('actionNavFunction'));
                }
                jQueryprevMonthNav.click(function (e) {
                    drawTable(jQuerycalendarElement, jQuerytableObj, prevYear, prevMonth);
                });
            }

            var nextIsValid = jQuerycalendarElement.data('showNext');
            if (typeof(nextIsValid) === 'number' || nextIsValid === false) {
                nextIsValid = checkMonthLimit(jQuerycalendarElement.data('showNext'), false);
            }

            var jQuerynextMonthNav = jQuery('<div class="calendar-month-navigation"></div>');
            jQuerynextMonthNav.attr('id', jQuerycalendarElement.attr('id') + '_nav-next');
            jQuerynextMonthNav.data('navigation', 'next');
            if (nextIsValid !== false) {
                nextMonth = (month + 1);
                nextYear = year;
                if (nextMonth == 12) {
                    nextYear = (nextYear + 1);
                    nextMonth = 0;
                }
                jQuerynextMonthNav.data('to', {year: nextYear, month: (nextMonth + 1)});
                jQuerynextMonthNav.append(jQuerynextMonthNavIcon);
                if (typeof(jQuerycalendarElement.data('actionNavFunction')) === 'function') {
                    jQuerynextMonthNav.click(jQuerycalendarElement.data('actionNavFunction'));
                }
                jQuerynextMonthNav.click(function (e) {
                    drawTable(jQuerycalendarElement, jQuerytableObj, nextYear, nextMonth);
                });
            }

            var monthLabels = jQuerycalendarElement.data('monthLabels');

            var jQueryprevMonthCell = jQuery('<th></th>').append(jQueryprevMonthNav);
            var jQuerynextMonthCell = jQuery('<th></th>').append(jQuerynextMonthNav);

            var jQuerycurrMonthLabel = jQuery('<span>' + monthLabels[month] + ' ' + year + '</span>');
            jQuerycurrMonthLabel.dblclick(function () {
                var dateInitObj = jQuerycalendarElement.data('initDate');
                drawTable(jQuerycalendarElement, jQuerytableObj, dateInitObj.getFullYear(), dateInitObj.getMonth());
            });

            var jQuerycurrMonthCell = jQuery('<th colspan="5"></th>');
            jQuerycurrMonthCell.append(jQuerycurrMonthLabel);

            var jQuerymonthHeaderRow = jQuery('<tr class="calendar-month-header"></tr>');
            jQuerymonthHeaderRow.append(jQueryprevMonthCell, jQuerycurrMonthCell, jQuerynextMonthCell);

            jQuerytableObj.append(jQuerymonthHeaderRow);
            return jQuerytableObj;
        }

        function appendDayOfWeekHeader(jQuerycalendarElement, jQuerytableObj) {
            if (jQuerycalendarElement.data('showDays') === true) {
                var weekStartsOn = jQuerycalendarElement.data('weekStartsOn');
                var dowLabels = jQuerycalendarElement.data('dowLabels');
                if (weekStartsOn === 0) {
                    var dowFull = jQuery.extend([], dowLabels);
                    var sunArray = new Array(dowFull.pop());
                    dowLabels = sunArray.concat(dowFull);
                }

                var jQuerydowHeaderRow = jQuery('<tr class="calendar-dow-header"></tr>');
                jQuery(dowLabels).each(function (index, value) {
                    jQuerydowHeaderRow.append('<th>' + value + '</th>');
                });
                jQuerytableObj.append(jQuerydowHeaderRow);
            }
            return jQuerytableObj;
        }

        function appendDaysOfMonth(jQuerycalendarElement, jQuerytableObj, year, month) {
            var ajaxSettings = jQuerycalendarElement.data('ajaxSettings');
            var weeksInMonth = calcWeeksInMonth(year, month);
            var lastDayinMonth = calcLastDayInMonth(year, month);
            var firstDow = calcDayOfWeek(year, month, 1);
            var lastDow = calcDayOfWeek(year, month, lastDayinMonth);
            var currDayOfMonth = 1;

            var weekStartsOn = jQuerycalendarElement.data('weekStartsOn');
            if (weekStartsOn === 0) {
                if (lastDow == 6) {
                    weeksInMonth++;
                }
                if (firstDow == 6 && (lastDow == 0 || lastDow == 1 || lastDow == 5)) {
                    weeksInMonth--;
                }
                firstDow++;
                if (firstDow == 7) {
                    firstDow = 0;
                }
            }

            for (var wk = 0; wk < weeksInMonth; wk++) {
                var jQuerydowRow = jQuery('<tr class="calendar-dow"></tr>');
                for (var dow = 0; dow < 7; dow++) {
                    if (dow < firstDow || currDayOfMonth > lastDayinMonth) {
                        jQuerydowRow.append('<td></td>');
                    } else {
                        var dateId = jQuerycalendarElement.attr('id') + '_' + dateAsString(year, month, currDayOfMonth);
                        var dayId = dateId + '_day';

                        var jQuerydayElement = jQuery('<div id="' + dayId + '" class="day" >' + currDayOfMonth + '</div>');
                        jQuerydayElement.data('day', currDayOfMonth);

                        if (jQuerycalendarElement.data('showToday') === true) {
                            if (isToday(year, month, currDayOfMonth)) {
                                jQuerydayElement.html('<span class="badge badge-today">' + currDayOfMonth + '</span>');
                            }
                        }

                        var jQuerydowElement = jQuery('<td id="' + dateId + '"></td>');
                        jQuerydowElement.append(jQuerydayElement);

                        jQuerydowElement.data('date', dateAsString(year, month, currDayOfMonth));
                        jQuerydowElement.data('hasEvent', false);

                        if (typeof(jQuerycalendarElement.data('actionFunction')) === 'function') {
                            jQuerydowElement.addClass('dow-clickable');
                            jQuerydowElement.click(function () {
                                jQuerycalendarElement.data('selectedDate', jQuery(this).data('date'));
                            });
                            jQuerydowElement.click(jQuerycalendarElement.data('actionFunction'));
                        }

                        jQuerydowRow.append(jQuerydowElement);

                        currDayOfMonth++;
                    }
                    if (dow == 6) {
                        firstDow = 0;
                    }
                }

                jQuerytableObj.append(jQuerydowRow);
            }
            return jQuerytableObj;
        }

        /* ----- Modal functions ----- */

        function createModal(id, title, body, footer) {
            var jQuerymodalHeaderButton = jQuery('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>');
            var jQuerymodalHeaderTitle = jQuery('<h4 class="modal-title" id="' + id + '_modal_title">' + title + '</h4>');

            var jQuerymodalHeader = jQuery('<div class="modal-header"></div>');
            jQuerymodalHeader.append(jQuerymodalHeaderButton);
            jQuerymodalHeader.append(jQuerymodalHeaderTitle);

            var jQuerymodalBody = jQuery('<div class="modal-body" id="' + id + '_modal_body">' + body + '</div>');

            var jQuerymodalFooter = jQuery('<div class="modal-footer" id="' + id + '_modal_footer"></div>');
            if (typeof(footer) !== 'undefined') {
                var jQuerymodalFooterAddOn = jQuery('<div>' + footer + '</div>');
                jQuerymodalFooter.append(jQuerymodalFooterAddOn);
            }

            var jQuerymodalContent = jQuery('<div class="modal-content"></div>');
            jQuerymodalContent.append(jQuerymodalHeader);
            jQuerymodalContent.append(jQuerymodalBody);
            jQuerymodalContent.append(jQuerymodalFooter);

            var jQuerymodalDialog = jQuery('<div class="modal-dialog"></div>');
            jQuerymodalDialog.append(jQuerymodalContent);

            var jQuerymodalFade = jQuery('<div class="modal fade" id="' + id + '_modal" tabindex="-1" role="dialog" aria-labelledby="' + id + '_modal_title" aria-hidden="true"></div>');
            jQuerymodalFade.append(jQuerymodalDialog);

            jQuerymodalFade.data('dateId', id);
            jQuerymodalFade.attr("dateId", id);

            return jQuerymodalFade;
        }

        /* ----- Event functions ----- */

        function checkEvents(jQuerycalendarElement, year, month) {
            var ajaxSettings = jQuerycalendarElement.data('ajaxSettings');

            jQuerycalendarElement.data('events', false);

            if (ajaxSettings === false) {
                return true;
            }

            if (typeof(ajaxSettings) != 'object' || typeof(ajaxSettings.url) == 'undefined') {
                alert('Invalid calendar event settings');
                return false;
            }

            var data = { year: year, month: (month + 1)};

            jQuery.ajax({
                type: 'GET',
                url: ajaxSettings.url,
                data: data,
                dataType: 'json'
            }).done(function (response) {
                    var events = [];
                    jQuery.each(response, function (k, v) {
                        events.push(response[k]);
                    });
                    jQuerycalendarElement.data('events', events);
                    drawEvents(jQuerycalendarElement);
                });
        }

        function drawEvents(jQuerycalendarElement) {
            var ajaxSettings = jQuerycalendarElement.data('ajaxSettings');

            var events = jQuerycalendarElement.data('events');
            if (events !== false) {
                jQuery(events).each(function (index, value) {
                    var id = jQuerycalendarElement.attr('id') + '_' + value.date;
                    var jQuerydowElement = jQuery('#' + id);
                    var jQuerydayElement = jQuery('#' + id + '_day');

                    jQuerydowElement.data('hasEvent', true);

                    if (typeof(value.title) !== 'undefined') {
                        jQuerydowElement.attr('title', value.title);
                    }

                    if (typeof(value.classname) === 'undefined') {
                        jQuerydowElement.addClass('event');
                    } else {
                        jQuerydowElement.addClass('event-styled');
                        jQuerydayElement.addClass(value.classname);
                    }

                    if (typeof(value.badge) !== 'undefined' && value.badge !== false) {
                        var badgeClass = (value.badge === true) ? '' : ' badge-' + value.badge;
                        var dayLabel = jQuerydayElement.data('day');
                        jQuerydayElement.html('<span class="badge badge-event' + badgeClass + '">' + dayLabel + '</span>');
                    }

                    if (typeof(value.body) !== 'undefined') {
                        if ('modal' in ajaxSettings && (ajaxSettings.modal === true)) {
                            jQuerydowElement.addClass('event-clickable');

                            var jQuerymodalElement = createModal(id, value.title, value.body, value.footer);
                            jQuery('body').append(jQuerymodalElement);

                            jQuery('#' + id).click(function () {
                                jQuery('#' + id + '_modal').modal();
                            });
                        }
                    }
                });
            }
        }

        /* ----- Helper functions ----- */

        function isToday(year, month, day) {
            var todayObj = new Date();
            var dateObj = new Date(year, month, day);
            return (dateObj.toDateString() == todayObj.toDateString());
        }

        function dateAsString(year, month, day) {
            d = (day < 10) ? '0' + day : day;
            m = month + 1;
            m = (m < 10) ? '0' + m : m;
            return year + '-' + m + '-' + d;
        }

        function calcDayOfWeek(year, month, day) {
            var dateObj = new Date(year, month, day, 0, 0, 0, 0);
            var dow = dateObj.getDay();
            if (dow == 0) {
                dow = 6;
            } else {
                dow--;
            }
            return dow;
        }

        function calcLastDayInMonth(year, month) {
            var day = 28;
            while (checkValidDate(year, month + 1, day + 1)) {
                day++;
            }
            return day;
        }

        function calcWeeksInMonth(year, month) {
            var daysInMonth = calcLastDayInMonth(year, month);
            var firstDow = calcDayOfWeek(year, month, 1);
            var lastDow = calcDayOfWeek(year, month, daysInMonth);
            var days = daysInMonth;
            var correct = (firstDow - lastDow);
            if (correct > 0) {
                days += correct;
            }
            return Math.ceil(days / 7);
        }

        function checkValidDate(y, m, d) {
            return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
        }

        function checkMonthLimit(count, invert) {
            if (count === false) {
                count = 0;
            }
            var d1 = jQuerycalendarElement.data('currDate');
            var d2 = jQuerycalendarElement.data('initDate');

            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth() + 1;
            months += d2.getMonth();

            if (invert === true) {
                if (months < (parseInt(count) - 1)) {
                    return true;
                }
            } else {
                if (months >= (0 - parseInt(count))) {
                    return true;
                }
            }
            return false;
        }
    }); // each()

    return this;
};

/**
 * Default settings
 *
 * @returns object
 *   language:          string,
 *   year:              integer,
 *   month:             integer,
 *   show_previous:     boolean|integer,
 *   show_next:         boolean|integer,
 *   cell_border:       boolean,
 *   today:             boolean,
 *   show_days:         boolean,
 *   weekstartson:      integer (0 = Sunday, 1 = Monday),
 *   nav_icon:          object: prev: string, next: string
 *   ajax:              object: url: string, modal: boolean,
 *   legend:            object array, [{type: string, label: string, classname: string}]
 *   action:            function
 *   action_nav:        function
 */
jQuery.fn.zabuto_calendar_defaults = function () {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var settings = {
        language: false,
        year: year,
        month: month,
        show_previous: true,
        show_next: true,
        cell_border: false,
        today: false,
        show_days: true,
        weekstartson: 1,
        nav_icon: false,
        ajax: false,
        legend: false,
        action: false,
        action_nav: false
    };
    return settings;
};

/**
 * Language settings
 *
 * @param lang
 * @returns {{month_labels: Array, dow_labels: Array}}
 */
jQuery.fn.zabuto_calendar_language = function (lang) {
    if (typeof(lang) == 'undefined' || lang === false) {
        lang = 'en';
    }

    switch (lang.toLowerCase()) {
        case 'de':
            return {
                month_labels: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                dow_labels: ["Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"]
            };
            break;

        case 'en':
            return {
                month_labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                dow_labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
            };
            break;

        case 'es':
            return {
                month_labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                dow_labels: ["Lu", "Ma", "Mi", "Ju", "Vi", "Sá", "Do"]
            };
            break;

        case 'fr':
            return {
                month_labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                dow_labels: ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"]
            };
            break;

        case 'it':
            return {
                month_labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
                dow_labels: ["Lun", "Mar", "Mer", "Gio", "Ven", "Sab", "Dom"]
            };
            break;

        case 'nl':
            return {
                month_labels: ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"],
                dow_labels: ["Ma", "Di", "Wo", "Do", "Vr", "Za", "Zo"]
            };
            break;
    }

};
