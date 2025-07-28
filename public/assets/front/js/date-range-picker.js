// Date Range Picker with Dual Calendar Overlays

class DateRangePicker {
    constructor(container, options = {}) {
        this.container = typeof container === 'string' ? document.querySelector(container) : container;
        this.options = {
            startDateId: 'start-date',
            endDateId: 'end-date',
            presets: [
                { label: 'Today', days: 0 },
                { label: 'Yesterday', days: -1 },
                { label: 'Last 7 days', days: -7 },
                { label: 'This month', type: 'thisMonth' },
                { label: 'Last month', type: 'lastMonth' },
                { label: 'This year', type: 'thisYear' },
                { label: 'Last year', type: 'lastYear' },
                { label: 'Custom Range', type: 'custom' }
            ],
            onChange: null,
            ...options
        };
        
        this.isOpen = false;
        this.startDate = null;
        this.endDate = null;
        this.startCalendarMonth = 0;
        this.startCalendarYear = new Date().getFullYear();
        this.endCalendarMonth = new Date().getMonth(); // End calendar shows same month by default
        this.endCalendarYear = new Date().getFullYear();
        
        // Handle year overflow for end calendar
        if (this.endCalendarMonth > 11) {
            this.endCalendarMonth = 0;
            this.endCalendarYear++;
        }
        
        this.isArabic = typeof localStorage !== 'undefined' ? localStorage.getItem('selectedLanguage') === 'ar' : false;
        
        this.render();
        this.attachEvents();
        
        // Listen for language changes at window level
        if (typeof window !== 'undefined') {
            window.addEventListener('languageChanged', (event) => {
                this.updateLanguage(event.detail.language);
            });

            window.addEventListener('settingsLoaded', (event) => {
                this.updateLanguage(event.detail.language);
            });
        }

        // Initial language setup
        const currentLang = typeof localStorage !== 'undefined' ? localStorage.getItem('selectedLanguage') || 'en' : 'en';
        this.updateLanguage(currentLang);
    }
    
    render() {
        // Create main container
        this.container.classList.add('date-range-picker-container');
        
        // Create the input display
        this.displayElement = document.createElement('div');
        this.displayElement.className = 'date-range-display date-picker-trigger';
        
        // Display text
        this.displayText = document.createElement('span');
        this.displayText.className = 'date-range-text';
        this.displayText.textContent = this.isArabic ? 'اختر نطاق التاريخ' : 'Select date range';
        this.displayElement.appendChild(this.displayText);
        
        // Create the dropdown
        this.dropdown = document.createElement('div');
        this.dropdown.className = 'date-range-dropdown';
        
        // Create preset section
        const presetSection = document.createElement('div');
        presetSection.className = 'date-range-presets';
        
        // Add presets
        this.options.presets.forEach(preset => {
            const presetBtn = document.createElement('button');
            presetBtn.className = 'date-range-preset';
            presetBtn.textContent = this.isArabic ? this.getArabicLabel(preset.label) : preset.label;
            presetBtn.dataset.preset = preset.type || preset.days;
            presetSection.appendChild(presetBtn);
        });
        
        this.dropdown.appendChild(presetSection);
        
        // Create the dual calendar overlay for custom range
        this.calendarOverlay = document.createElement('div');
        this.calendarOverlay.className = 'calendar-overlay dual-calendar-overlay';
        
        // Create main calendar container
        const mainCalendarContainer = document.createElement('div');
        mainCalendarContainer.className = 'dual-calendar-container';
        
        // Create start date calendar
        this.startCalendarContainer = this.createCalendarContainer('start');
        mainCalendarContainer.appendChild(this.startCalendarContainer);
        
        // Create end date calendar
        this.endCalendarContainer = this.createCalendarContainer('end');
        mainCalendarContainer.appendChild(this.endCalendarContainer);
        
        this.calendarOverlay.appendChild(mainCalendarContainer);
        
        // Create shared footer
        const calendarFooter = document.createElement('div');
        calendarFooter.className = 'dual-calendar-footer';
        
        // Apply button
        const applyBtn = document.createElement('button');
        applyBtn.className = 'calendar-apply-btn';
        applyBtn.textContent = this.isArabic ? 'تطبيق' : 'Apply';
        calendarFooter.appendChild(applyBtn);
        
        // Cancel button
        const cancelBtn = document.createElement('button');
        cancelBtn.className = 'calendar-cancel-btn';
        cancelBtn.textContent = this.isArabic ? 'إلغاء' : 'Cancel';
        calendarFooter.appendChild(cancelBtn);
        
        // Clear button
        const clearBtn = document.createElement('button');
        clearBtn.className = 'calendar-clear-btn';
        clearBtn.textContent = this.isArabic ? 'مسح' : 'Clear';
        calendarFooter.appendChild(clearBtn);
        
        this.calendarOverlay.appendChild(calendarFooter);
        
        // Add elements to container
        this.container.appendChild(this.displayElement);
        this.container.appendChild(this.dropdown);
        document.body.appendChild(this.calendarOverlay);
    }
    
    createCalendarContainer(type) {
        const container = document.createElement('div');
        container.className = `calendar-container ${type}-calendar`;
        
        // Calendar title
        const title = document.createElement('div');
        title.className = 'calendar-title';
        title.textContent = type === 'start' 
            ? (this.isArabic ? 'تاريخ البداية' : 'Start Date')
            : (this.isArabic ? 'تاريخ النهاية' : 'End Date');
        container.appendChild(title);
        
        // Calendar header with month/year navigation
        const calendarHeader = document.createElement('div');
        calendarHeader.className = 'calendar-header';
        
        // Previous month button
        const prevMonthBtn = document.createElement('button');
        prevMonthBtn.className = 'calendar-nav-btn prev-month';
        prevMonthBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prevMonthBtn.dataset.calendarType = type;
        calendarHeader.appendChild(prevMonthBtn);
        
        // Month/Year display
        const monthYearDisplay = document.createElement('div');
        monthYearDisplay.className = 'month-year-display';
        calendarHeader.appendChild(monthYearDisplay);
        
        // Next month button
        const nextMonthBtn = document.createElement('button');
        nextMonthBtn.className = 'calendar-nav-btn next-month';
        nextMonthBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
        nextMonthBtn.dataset.calendarType = type;
        calendarHeader.appendChild(nextMonthBtn);
        
        container.appendChild(calendarHeader);
        
        // Calendar body with days
        const calendarBody = document.createElement('div');
        calendarBody.className = 'calendar-body';
        container.appendChild(calendarBody);
        
        // Store references
        if (type === 'start') {
            this.startPrevBtn = prevMonthBtn;
            this.startNextBtn = nextMonthBtn;
            this.startMonthYearDisplay = monthYearDisplay;
            this.startCalendarBody = calendarBody;
        } else {
            this.endPrevBtn = prevMonthBtn;
            this.endNextBtn = nextMonthBtn;
            this.endMonthYearDisplay = monthYearDisplay;
            this.endCalendarBody = calendarBody;
        }
        
        return container;
    }
    
    getArabicLabel(label) {
        const arabicLabels = {
            'Today': 'اليوم',
            'Yesterday': 'أمس',
            'Last 7 days': 'آخر ٧ أيام',
            'This month': 'هذا الشهر',
            'Last month': 'الشهر الماضي',
            'This year': 'هذا العام',
            'Last year': 'العام الماضي',
            'Custom Range': 'نطاق مخصص'
        };
        return arabicLabels[label] || label;
    }
    
    attachEvents() {
        // Toggle dropdown on display click
        this.displayElement.addEventListener('click', () => {
            this.toggleDropdown();
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!this.container.contains(e.target) && 
                !this.calendarOverlay.contains(e.target) && 
                this.isOpen && 
                this.calendarOverlay.style.display !== 'flex') {
                this.closeDropdown();
            }
        });
        
        // Preset buttons
        const presetButtons = this.dropdown.querySelectorAll('.date-range-preset');
        presetButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const presetValue = btn.dataset.preset;
                
                if (presetValue === 'custom') {
                    this.openCalendarOverlay();
                } else {
                    this.applyPreset(presetValue);
                }
            });
        });
        
        // Calendar navigation for both calendars
        this.startPrevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.changeMonth('start', -1);
        });
        
        this.startNextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.changeMonth('start', 1);
        });
        
        this.endPrevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.changeMonth('end', -1);
        });
        
        this.endNextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.changeMonth('end', 1);
        });
        
        // Calendar buttons
        const applyBtn = this.calendarOverlay.querySelector('.calendar-apply-btn');
        const cancelBtn = this.calendarOverlay.querySelector('.calendar-cancel-btn');
        const clearBtn = this.calendarOverlay.querySelector('.calendar-clear-btn');
        
        applyBtn.addEventListener('click', () => {
            if (this.startDate && this.endDate) {
                // Ensure start date is before end date
                if (this.startDate > this.endDate) {
                    const temp = this.startDate;
                    this.startDate = this.endDate;
                    this.endDate = temp;
                }
                this.updateDisplay();
                this.closeCalendarOverlay();
                this.closeDropdown();
                this.notifyChange();
            } else {
                alert(this.isArabic ? 'يرجى تحديد تاريخ البدء والانتهاء' : 'Please select both start and end dates');
            }
        });
        
        cancelBtn.addEventListener('click', () => {
            this.closeCalendarOverlay();
        });
        
        clearBtn.addEventListener('click', () => {
            this.clearDateRange();
            this.renderBothCalendars(); // Re-render to show cleared selection
        });
        
        // Close calendar overlay when clicking outside of it
        this.calendarOverlay.addEventListener('click', (e) => {
            if (e.target === this.calendarOverlay) {
                this.closeCalendarOverlay();
            }
        });
    }
    
    toggleDropdown() {
        if (this.isOpen) {
            this.closeDropdown();
        } else {
            this.openDropdown();
        }
    }
    
    openDropdown() {
        this.dropdown.style.display = 'block';
        this.isOpen = true;
        this.displayElement.classList.add('active');
    }
    
    closeDropdown() {
        this.dropdown.style.display = 'none';
        this.isOpen = false;
        this.displayElement.classList.remove('active');
        // Don't automatically close calendar overlay - let user choose both dates
    }
    
    openCalendarOverlay() {
        this.calendarOverlay.style.display = 'flex';
        this.closeDropdown(); // Close the dropdown but keep calendar open
        this.renderBothCalendars();
    }
    
    closeCalendarOverlay() {
        this.calendarOverlay.style.display = 'none';
    }
    
    renderBothCalendars() {
        this.renderCalendar('start');
        this.renderCalendar('end');
    }
    
    renderCalendar(type) {
        const isStart = type === 'start';
        const currentMonth = isStart ? this.startCalendarMonth : this.endCalendarMonth;
        const currentYear = isStart ? this.startCalendarYear : this.endCalendarYear;
        const monthYearDisplay = isStart ? this.startMonthYearDisplay : this.endMonthYearDisplay;
        const calendarBody = isStart ? this.startCalendarBody : this.endCalendarBody;
        
        const currentDate = new Date(currentYear, currentMonth);
        
        // Update month/year display
        monthYearDisplay.textContent = currentDate.toLocaleDateString(this.isArabic ? 'ar-EG' : 'en-US', {
            month: 'long',
            year: 'numeric'
        });
        
        // Clear previous calendar
        calendarBody.innerHTML = '';
        
        // Create weekdays header
        const weekdays = document.createElement('div');
        weekdays.className = 'calendar-weekdays';
        const weekdayNames = this.isArabic ? 
            ['أحد', 'إثنين', 'ثلاث', 'أربع', 'خميس', 'جمعة', 'سبت'] :
            ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        
        weekdayNames.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.textContent = day;
            weekdays.appendChild(dayElement);
        });
        
        calendarBody.appendChild(weekdays);
        
        // Create days grid
        const daysGrid = document.createElement('div');
        daysGrid.className = 'calendar-days';
        
        // Get first day of month and total days
        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const totalDays = lastDay.getDate();
        const startingDay = firstDay.getDay();
        
        // Add empty cells for days before first of month
        for (let i = 0; i < startingDay; i++) {
            const emptyDay = document.createElement('div');
            emptyDay.className = 'calendar-day empty';
            daysGrid.appendChild(emptyDay);
        }
        
        // Add days of the month
        for (let day = 1; day <= totalDays; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';
            dayElement.textContent = this.isArabic ? this.toArabicNumeral(day) : day;
            
            const currentDate = new Date(currentYear, currentMonth, day);
            
            // Add classes for selected dates
            if (this.startDate && this.startDate.toDateString() === currentDate.toDateString()) {
                dayElement.classList.add('selected', 'start-date');
            }
            if (this.endDate && this.endDate.toDateString() === currentDate.toDateString()) {
                dayElement.classList.add('selected', 'end-date');
                alert(this.isArabic ?'يرجى إدخال تاريخ بدء يسبق تاريخ الانتهاء' : 'Please enter a start date that comes before the end date');
            }
            
            // Add temporary selection for single date
            if (this.startDate && !this.endDate && this.startDate.toDateString() === currentDate.toDateString()) {
                dayElement.classList.add('single-selected');
            }
            
            // Add in-range styling
            if (this.startDate && this.endDate && 
                currentDate >= this.startDate && currentDate <= this.endDate) {
                dayElement.classList.add('in-range');
            }
            
            // Add click handler
            dayElement.addEventListener('click', () => {
                this.handleDayClick(currentDate, type);
            });
            
            daysGrid.appendChild(dayElement);
        }
        
        calendarBody.appendChild(daysGrid);
    }
    
    toArabicNumeral(num) {
        const arabicNumerals = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        return num.toString().split('').map(digit => 
            isNaN(parseInt(digit)) ? digit : arabicNumerals[parseInt(digit)]
        ).join('');
    }
    
    changeMonth(calendarType, delta) {
        if (calendarType === 'start') {
            this.startCalendarMonth += delta;
            
            if (this.startCalendarMonth < 0) {
                this.startCalendarMonth = 11;
                this.startCalendarYear--;
            } else if (this.startCalendarMonth > 11) {
                this.startCalendarMonth = 0;
                this.startCalendarYear++;
            }
        } else {
            this.endCalendarMonth += delta;
            
            if (this.endCalendarMonth < 0) {
                this.endCalendarMonth = 11;
                this.endCalendarYear--;
            } else if (this.endCalendarMonth > 11) {
                this.endCalendarMonth = 0;
                this.endCalendarYear++;
            }
        }
        
        this.renderCalendar(calendarType);
    }
    
    handleDayClick(date, calendarType) {
        if (calendarType === 'start') {
            this.startDate = date;
            // If end date is before start date, clear it
            if (this.endDate && this.endDate < date) {
                this.endDate = null;
            }
        } else {
            this.endDate = date;
            // If start date is after end date, clear it
            if (this.startDate && this.startDate > date) {
                this.startDate = null;
            }
        }
        
        this.renderBothCalendars();
    }
    
    applyPreset(preset) {
        const today = new Date();
        let start, end;
        
        if (preset === 'thisYear') {
            start = new Date(today.getFullYear(), 0, 1);
            end = new Date(today.getFullYear(), 11, 31);
        } else if (preset === 'lastYear') {
            start = new Date(today.getFullYear() - 1, 0, 1);
            end = new Date(today.getFullYear() - 1, 11, 31);
        } else if (preset === 'thisMonth') {
            start = new Date(today.getFullYear(), today.getMonth(), 1);
            end = new Date(today.getFullYear(), today.getMonth() + 1, 0);
        } else if (preset === 'lastMonth') {
            start = new Date(today.getFullYear(), today.getMonth() - 1, 1);
            end = new Date(today.getFullYear(), today.getMonth(), 0);
        } else {
            const days = parseInt(preset);
            if (days === 0) {
                start = new Date(today);
                end = new Date(today);
            } else {
                start = new Date(today);
                start.setDate(start.getDate() + days);
                end = new Date(today);
            }
        }
        
        this.startDate = start;
        this.endDate = end;
        
        this.updateDisplay();
        this.closeDropdown();
        this.notifyChange();
    }
    
    clearDateRange() {
        this.startDate = null;
        this.endDate = null;
        
        this.displayText.textContent = this.isArabic ? 'اختر نطاق التاريخ' : 'Select date range';
        
        const startDateEl = document.getElementById(this.options.startDateId);
        const endDateEl = document.getElementById(this.options.endDateId);
        
        if (startDateEl) startDateEl.value = '';
        if (endDateEl) endDateEl.value = '';
        
        this.notifyChange();
    }
    
    updateDisplay() {
        if (this.startDate && this.endDate) {
            const startFormatted = this.formatDisplayDate(this.startDate);
            const endFormatted = this.formatDisplayDate(this.endDate);
            
            if (this.startDate.toDateString() === this.endDate.toDateString()) {
                this.displayText.textContent = startFormatted;
            } else {
                this.displayText.textContent = `${startFormatted} - ${endFormatted}`;
            }
        } else {
            this.displayText.textContent = this.isArabic ? 'اختر نطاق التاريخ' : 'Select date range';
        }
    }
    
    formatDateForInput(date) {
        return date.toISOString().split('T')[0];
    }
    
    formatDisplayDate(date) {
        return date.toLocaleDateString(this.isArabic ? 'ar-EG' : 'en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }
    
    notifyChange() {
        const startDateEl = document.getElementById(this.options.startDateId);
        const endDateEl = document.getElementById(this.options.endDateId);
        
        if (startDateEl) {
            startDateEl.value = this.startDate ? this.formatDateForInput(this.startDate) : '';
            startDateEl.dispatchEvent(new Event('change', { bubbles: true }));
        }
        
        if (endDateEl) {
            endDateEl.value = this.endDate ? this.formatDateForInput(this.endDate) : '';
            endDateEl.dispatchEvent(new Event('change', { bubbles: true }));
        }
        
        if (typeof this.options.onChange === 'function') {
            this.options.onChange({
                startDate: this.startDate,
                endDate: this.endDate
            });
        }
    }
    
    getStartDate() {
        return this.startDate;
    }
    
    getEndDate() {
        return this.endDate;
    }
    
    setDateRange(startDate, endDate) {
        this.startDate = startDate;
        this.endDate = endDate;
        this.updateDisplay();
    }
    
    updateLanguage(language) {
        this.isArabic = language === 'ar';
        
        if (this.startDate && this.endDate) {
            this.updateDisplay();
        } else {
            this.displayText.textContent = this.isArabic ? 'اختر نطاق التاريخ' : 'Select date range';
        }
        
        // Update calendar titles
        const startTitle = this.startCalendarContainer.querySelector('.calendar-title');
        const endTitle = this.endCalendarContainer.querySelector('.calendar-title');
        
        if (startTitle) startTitle.textContent = this.isArabic ? 'تاريخ البداية' : 'Start Date';
        if (endTitle) endTitle.textContent = this.isArabic ? 'تاريخ النهاية' : 'End Date';
        
        // Update presets
        const presetButtons = this.dropdown.querySelectorAll('.date-range-preset');
        presetButtons.forEach(btn => {
            const presetType = btn.dataset.preset;
            let label;
            
            switch(presetType) {
                case '0': label = this.isArabic ? 'اليوم' : 'Today'; break;
                case '-1': label = this.isArabic ? 'أمس' : 'Yesterday'; break;
                case '-7': label = this.isArabic ? 'آخر ٧ أيام' : 'Last 7 days'; break;
                case 'thisMonth': label = this.isArabic ? 'هذا الشهر' : 'This month'; break;
                case 'lastMonth': label = this.isArabic ? 'الشهر الماضي' : 'Last month'; break;
                case 'thisYear': label = this.isArabic ? 'هذا العام' : 'This year'; break;
                case 'lastYear': label = this.isArabic ? 'العام الماضي' : 'Last year'; break;
                case 'custom': label = this.isArabic ? 'نطاق مخصص' : 'Custom Range'; break;
                default: label = btn.textContent;
            }
            
            btn.textContent = label;
        });
        
        // Update buttons in calendar footer
        const applyBtn = this.calendarOverlay.querySelector('.calendar-apply-btn');
        const cancelBtn = this.calendarOverlay.querySelector('.calendar-cancel-btn');
        const clearBtn = this.calendarOverlay.querySelector('.calendar-clear-btn');
        
        if (applyBtn) applyBtn.textContent = this.isArabic ? 'تطبيق' : 'Apply';
        if (cancelBtn) cancelBtn.textContent = this.isArabic ? 'إلغاء' : 'Cancel';
        if (clearBtn) clearBtn.textContent = this.isArabic ? 'مسح' : 'Clear';
        
        // Re-render calendars if open
        if (this.calendarOverlay.style.display === 'flex') {
            this.renderBothCalendars();
        }
    }
}

// Initialize the picker when the document is ready
document.addEventListener('DOMContentLoaded', () => {
    const dateFilterContainer = document.querySelector('.filter-group.date-filter');
    if (dateFilterContainer) {
        let datePickerContainer = dateFilterContainer.querySelector('.date-picker-container');
        if (!datePickerContainer) {
            datePickerContainer = document.createElement('div');
            datePickerContainer.className = 'date-picker-container';
            dateFilterContainer.appendChild(datePickerContainer);
        }
        
        let startDateInput = document.getElementById('start-date');
        let endDateInput = document.getElementById('end-date');
        
        if (!startDateInput) {
            startDateInput = document.createElement('input');
            startDateInput.type = 'hidden';
            startDateInput.id = 'start-date';
            dateFilterContainer.appendChild(startDateInput);
        }
        
        if (!endDateInput) {
            endDateInput = document.createElement('input');
            endDateInput.type = 'hidden';
            endDateInput.id = 'end-date';
            dateFilterContainer.appendChild(endDateInput);
        }
        
        const dateRangePicker = new DateRangePicker(datePickerContainer, {
            startDateId: 'start-date',
            endDateId: 'end-date',
            onChange: (dates) => {
                const clearFiltersBtn = document.getElementById('clear-filters');
                if (clearFiltersBtn) {
                    clearFiltersBtn.disabled = !dates.startDate && !dates.endDate;
                }
                
                if (typeof filterArticles === 'function') {
                    filterArticles();
                }
            }
        });
        
        if (typeof window !== 'undefined') {
            window.dateRangePicker = dateRangePicker;
            
            window.updateDateRangePicker = function(language) {
                if (window.dateRangePicker) {
                    window.dateRangePicker.updateLanguage(language);
                }
            };
        }
    }
});

// Function to filter articles based on selected date range
function filterArticles() {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;
    
    if (!startDate && !endDate) {
        document.querySelectorAll('.box').forEach(box => {
            box.style.display = 'block';
        });
        return;
    }
    
    const start = startDate ? new Date(startDate) : null;
    const end = endDate ? new Date(endDate) : null;
    
    document.querySelectorAll('.box').forEach(box => {
        const articleDate = new Date(box.getAttribute('data-date'));
        let show = true;
        
        if (start && articleDate < start) {
            show = false;
        }
        if (end && articleDate > end) {
            show = false;
        }
        
        box.style.display = show ? 'block' : 'none';
    });
}