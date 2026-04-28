// Global Tailwind Configuration for ATS Enterprise IT
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#E21D2E',
                'primary-light': 'rgba(226, 29, 46, 0.1)',
                'primary-border': 'rgba(226, 29, 46, 0.2)',
                'blue-primary': '#3152EA',
                'blue-light': '#F4F7FA',
                surface: '#FFFFFF',
                background: '#FAFAFB',
                text: {
                    main: '#171A1F',
                    muted: '#565D6D',
                    light: '#DEE1E6'
                },
                // Brand colors and typography for the ATS design system
                dark: '#171A1F',
                'gray-body': '#565D6D',
                'gray-border': '#DEE1E6',
                'gray-light': '#FAFAFB',
                'red-muted': '#FDF2F3'
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                heading: ['Space Grotesk', 'sans-serif'],
                arabic: ['Cairo', 'Tajawal', 'sans-serif'],
            },
            boxShadow: {
                'card': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)',
            }
        }
    }
};
