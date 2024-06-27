<button onclick="setTheme('dark')" class="nav-link px-0 hide-theme-dark" title="Dark mode" data-bs-toggle="tooltip"
    data-bs-placement="bottom">
    <x-icon.moon />
</button>
<button onclick="setTheme('light')" class="nav-link px-0 hide-theme-light" title="Light mode" data-bs-toggle="tooltip"
    data-bs-placement="bottom">
    <x-icon.sun />
</button>

@pushOnce('script')
    <script>
        let themeKey = "kedb-theme"
        let defaultTheme = "light"

        initTheme()

        document.addEventListener('livewire:navigated', () => {
            initTheme()
        })

        function initTheme() {
            if (!localStorage.getItem(themeKey)) {
                localStorage.setItem(themeKey, defaultTheme)
            }

            let currentTheme = localStorage.getItem(themeKey)

            setTheme(currentTheme, false)
        }

        function setTheme(theme, save = true) {
            if (theme === 'dark') {
                document.body.setAttribute("data-bs-theme", theme)
            } else {
                document.body.removeAttribute("data-bs-theme")
            }

            if (save) {
                localStorage.setItem(themeKey, theme)
            }
        }
    </script>
@endPushOnce
