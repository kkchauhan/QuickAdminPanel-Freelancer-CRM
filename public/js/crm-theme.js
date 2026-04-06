/**
 * Freelancer CRM — "Midnight Glass" Theme JS
 * Micro-interactions and dark-mode enhancements
 */

document.addEventListener('DOMContentLoaded', function () {

    // -------- Button Ripple Effect --------
    document.querySelectorAll('.btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            var ripple = document.createElement('span');
            var rect = btn.getBoundingClientRect();
            var size = Math.max(rect.width, rect.height);
            var x = e.clientX - rect.left - size / 2;
            var y = e.clientY - rect.top - size / 2;

            ripple.style.cssText =
                'position:absolute;border-radius:50%;pointer-events:none;' +
                'width:' + size + 'px;height:' + size + 'px;' +
                'left:' + x + 'px;top:' + y + 'px;' +
                'background:rgba(255,255,255,0.18);' +
                'transform:scale(0);animation:crm-ripple 0.5s ease-out forwards;';

            btn.style.position = btn.style.position || 'relative';
            btn.style.overflow = 'hidden';
            btn.appendChild(ripple);
            setTimeout(function () { ripple.remove(); }, 600);
        });
    });

    // Add ripple keyframes dynamically
    if (!document.getElementById('crm-ripple-style')) {
        var style = document.createElement('style');
        style.id = 'crm-ripple-style';
        style.textContent = '@keyframes crm-ripple { to { transform: scale(2.5); opacity: 0; } }';
        document.head.appendChild(style);
    }

    // -------- Chart.js Dark-Mode Defaults --------
    if (typeof Chart !== 'undefined') {
        Chart.defaults.color = '#8899aa';
        Chart.defaults.borderColor = 'rgba(255, 255, 255, 0.06)';
        Chart.defaults.plugins.legend.labels.color = '#8899aa';
        Chart.defaults.plugins.tooltip.backgroundColor = '#243044';
        Chart.defaults.plugins.tooltip.titleColor = '#e8ecf1';
        Chart.defaults.plugins.tooltip.bodyColor = '#e8ecf1';
        Chart.defaults.plugins.tooltip.borderColor = 'rgba(255,255,255,0.1)';
        Chart.defaults.plugins.tooltip.borderWidth = 1;
        Chart.defaults.plugins.tooltip.cornerRadius = 8;
        Chart.defaults.plugins.tooltip.padding = 10;
        Chart.defaults.scale.grid = Chart.defaults.scale.grid || {};
        Chart.defaults.scale.grid.color = 'rgba(255, 255, 255, 0.04)';
        Chart.defaults.scale.ticks = Chart.defaults.scale.ticks || {};
        Chart.defaults.scale.ticks.color = '#8899aa';
    }

    // -------- Smooth page transition --------
    document.querySelectorAll('a[href]:not([href^="#"]):not([data-toggle]):not([onclick])').forEach(function (link) {
        if (link.hostname === window.location.hostname && !link.hasAttribute('target')) {
            link.addEventListener('click', function () {
                document.querySelector('.content-wrapper').style.opacity = '0.6';
                document.querySelector('.content-wrapper').style.transition = 'opacity 0.15s ease';
            });
        }
    });

    // -------- Active sidebar parent auto-open --------
    document.querySelectorAll('.nav-sidebar .nav-treeview .nav-link.active').forEach(function (activeLink) {
        var parent = activeLink.closest('.has-treeview');
        if (parent) {
            parent.classList.add('menu-open');
            var childMenu = parent.querySelector('.nav-treeview');
            if (childMenu) childMenu.style.display = 'block';
        }
    });

});
