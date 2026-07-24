{{-- ==========================================================
     COMPONENT: Tailwind Custom Config (colors, fonts, animations)
     ========================================================== --}}
    <script>
    // Tailwind custom config — tokens derived from SMK Bakti Idhata brand palette
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    forest: {
                        50: '#F0FBF4',
                        100: '#DCFCE7',
                        200: '#BBF7D0',
                        300: '#86EFAC',
                        400: '#4ADE80',
                        500: '#22C55E',
                        600: '#16A34A',
                        700: '#166534',
                        800: '#14532D',
                        900: '#0F3D22',
                        950: '#0A2818',
                    },
                    sun: {
                        400: '#FDE047',
                        500: '#FACC15',
                    },
                    mist: '#F8FAFC',
                },
                fontFamily: {
                    display: ['Sora', 'sans-serif'],
                    body: ['Inter', 'sans-serif'],
                },
                animation: {
                    'blob': 'blob 14s ease-in-out infinite',
                    'blob-slow': 'blob 20s ease-in-out infinite',
                    'float': 'float 6s ease-in-out infinite',
                    'float-slow': 'float 9s ease-in-out infinite',
                    'ripple': 'ripple 0.6s linear',
                    'gradient-shift': 'gradient-shift 8s ease infinite',
                },
                keyframes: {
                    blob: {
                        '0%, 100%': {
                            transform: 'translate(0px, 0px) scale(1)'
                        },
                        '33%': {
                            transform: 'translate(30px, -40px) scale(1.1)'
                        },
                        '66%': {
                            transform: 'translate(-25px, 25px) scale(0.95)'
                        },
                    },
                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0px)'
                        },
                        '50%': {
                            transform: 'translateY(-14px)'
                        },
                    },
                    ripple: {
                        '0%': {
                            transform: 'scale(0)',
                            opacity: '0.45'
                        },
                        '100%': {
                            transform: 'scale(2.8)',
                            opacity: '0'
                        },
                    },
                    'gradient-shift': {
                        '0%, 100%': {
                            backgroundPosition: '0% 50%'
                        },
                        '50%': {
                            backgroundPosition: '100% 50%'
                        },
                    },
                },
            }
        }
    }
    </script>
