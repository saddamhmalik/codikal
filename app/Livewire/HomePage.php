<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class HomePage extends Component
{
    public string $seoTitle = 'Codikal | Software Development Services Company';
    public string $seoDescription = 'Codikal provides web development, mobile app development, SaaS solutions, and API integration services for startups and enterprises.';
    public string $seoKeywords = 'software development services company, web development services, mobile app development services, SaaS development company, API integration';

    public array $services = [
        [
            'title' => 'Custom Websites',
            'tagline' => 'Responsive sites that look great and drive results',
            'description' => 'We build fast, search-friendly websites that work on every device and help your business grow.',
            'features' => [
                'Mobile-first, responsive layouts',
                'Search engine optimization',
                'Optimized for speed and reliability',
            ],
            'icon' => 'web',
        ],
        [
            'title' => 'Mobile Apps',
            'tagline' => 'iOS and Android apps that users rely on',
            'description' => 'From native to cross-platform, we deliver mobile applications that perform and scale.',
            'features' => [
                'React Native & cross-platform',
                'iOS (Swift) development',
                'Android (Kotlin/Java) development',
            ],
            'icon' => 'mobile',
        ],
        [
            'title' => 'Web Apps / SaaS',
            'tagline' => 'Scalable web products from front to back',
            'description' => 'We design and build full-stack web applications and SaaS platforms with modern tech and clean architecture.',
            'features' => [
                'React and modern frontends',
                'Supabase and backend services',
                'Node.js and REST/GraphQL APIs',
            ],
            'icon' => 'saas',
        ],
        [
            'title' => 'AI Chatbots / Assistants',
            'tagline' => 'Smart assistants powered by AI and language models',
            'description' => 'We create conversational agents and automation tools using custom models, NLP, and workflow integration.',
            'features' => [
                'Tailored GPT and AI models',
                'Natural language understanding',
                'Workflow and task automation',
            ],
            'icon' => 'ai',
        ],
        [
            'title' => 'UI/UX Design',
            'tagline' => 'Clear, usable interfaces backed by research',
            'description' => 'We turn ideas into polished designs—from research and prototypes to production-ready UI and handoff to code.',
            'features' => [
                'Figma designs turned into code',
                'User and market research',
                'Wireframes and prototyping',
            ],
            'icon' => 'design',
        ],
        [
            'title' => 'Full Solutions',
            'tagline' => 'From build to launch and long-term support',
            'description' => 'We handle the full lifecycle: development, deployment, SEO, and ongoing maintenance so you can focus on your business.',
            'features' => [
                'Cloud deployment and hosting',
                'SEO strategy and implementation',
                'Monitoring and continuous support',
            ],
            'icon' => 'solutions',
        ],
    ];

    public array $processSteps = [
        [
            'title' => 'Requirement Discovery',
            'description' => 'We gather business goals, users needs, and technical scope to align on outcomes.',
            'icon' => 'search',
        ],
        [
            'title' => 'Business Analysis',
            'description' => 'We validate assumptions, define priorities, and shape a practical delivery roadmap.',
            'icon' => 'analysis',
        ],
        [
            'title' => 'UI/UX Design',
            'description' => 'We design user journeys and polished interfaces before implementation starts.',
            'icon' => 'design',
        ],
        [
            'title' => 'Development',
            'description' => 'Our team builds the product in agile iterations with transparent progress updates.',
            'icon' => 'code',
        ],
        [
            'title' => 'Quality Assurance',
            'description' => 'Automated and manual testing ensure stability, performance, and reliability.',
            'icon' => 'qa',
        ],
        [
            'title' => 'Deployment',
            'description' => 'We launch smoothly with proper environments, monitoring, and handover docs.',
            'icon' => 'deploy',
        ],
        [
            'title' => 'Ongoing Support',
            'description' => 'Post-launch optimization, fixes, and enhancements keep your product moving forward.',
            'icon' => 'support',
        ],
    ];

    public array $techStack = [
        'Laravel',
        'Livewire',
        'Alpine.js',
        'Tailwind CSS',
        'React',
        'Vue.js',
        'Node.js',
        'TypeScript',
        'PostgreSQL',
        'MySQL',
        'Redis',
        'Docker',
        'AWS',
        'Supabase',
        'Stripe',
        'GraphQL',
        'GitHub Actions',
        'Terraform',
        'Figma',
        'PHP',
    ];

    /** Tech name => simpleicons URL for consistent logo coverage */
    public static function techIconUrl(string $name): ?string
    {
        return match (strtolower($name)) {
            'laravel' => 'https://cdn.simpleicons.org/laravel/FF2D20',
            'livewire' => 'https://cdn.simpleicons.org/livewire/FB70A9',
            'alpine.js', 'alpinejs' => 'https://cdn.simpleicons.org/alpinedotjs/8BC0D0',
            'tailwind css' => 'https://cdn.simpleicons.org/tailwindcss/06B6D4',
            'react', 'react native' => 'https://cdn.simpleicons.org/react/61DAFB',
            'vue.js', 'vue' => 'https://cdn.simpleicons.org/vuedotjs/4FC08D',
            'node.js' => 'https://cdn.simpleicons.org/nodedotjs/5FA04E',
            'typescript' => 'https://cdn.simpleicons.org/typescript/3178C6',
            'postgresql' => 'https://cdn.simpleicons.org/postgresql/4169E1',
            'mysql' => 'https://cdn.simpleicons.org/mysql/4479A1',
            'redis' => 'https://cdn.simpleicons.org/redis/DC382D',
            'docker' => 'https://cdn.simpleicons.org/docker/2496ED',
            'aws' => 'https://cdn.simpleicons.org/amazonaws/FF9900',
            'supabase' => 'https://cdn.simpleicons.org/supabase/3ECF8E',
            'stripe' => 'https://cdn.simpleicons.org/stripe/635BFF',
            'graphql' => 'https://cdn.simpleicons.org/graphql/E10098',
            'github', 'github actions' => 'https://cdn.simpleicons.org/githubactions/2088FF',
            'terraform' => 'https://cdn.simpleicons.org/terraform/844FBA',
            'figma' => 'https://cdn.simpleicons.org/figma/F24E1E',
            'php' => 'https://cdn.simpleicons.org/php/777BB4',
            default => null,
        };
    }

    public array $projects = [
        [
            'name' => 'AnyTrip.in',
            'tagline' => 'OTA and CRM',
            'description' => 'Full-stack Online Travel Agency platform with integrated CRM for bookings, inventory, and customer management.',
            'image' => 'images/portfolio-anytrip.png',
            'url' => 'https://anytrip.in',
            'tech' => ['Laravel', 'React', 'MySQL', 'Redis', 'AWS', 'Tailwind CSS', 'Docker'],
        ],
        [
            'name' => 'FinTrack SaaS',
            'tagline' => 'Finance workflow automation',
            'description' => 'Cloud-based finance workflow and reporting platform with role-based dashboards and approvals.',
            'image' => 'images/portfolio-fintrack.png',
            'url' => null,
            'tech' => ['Laravel', 'Livewire', 'PostgreSQL', 'Docker', 'Redis', 'AWS'],
        ],
        [
            'name' => 'CareConnect',
            'tagline' => 'Telehealth platform',
            'description' => 'Cross-platform telehealth app with video appointments, e-prescriptions, and secure messaging.',
            'image' => 'images/portfolio-careconnect.png',
            'url' => null,
            'tech' => ['React Native', 'Laravel', 'WebRTC', 'MySQL', 'Node.js', 'Docker'],
        ],
    ];

    public array $testimonials = [
        [
            'quote' => 'Codikal delivered our OTA and CRM platform on time. The team understood our domain and built a scalable solution we rely on daily.',
            'name' => 'Goutam Gandral',
            'role' => 'Founder',
            'company' => 'AnyTrip.in',
            'avatar' => 'https://api.dicebear.com/9.x/notionists/svg?seed=GoutamGandral&backgroundColor=ffffff',
        ],
        [
            'quote' => 'Professional, responsive, and technically strong. They modernized our legacy booking system and improved performance significantly.',
            'name' => 'Priya Sharma',
            'role' => 'CTO',
            'company' => 'TravelTech Solutions',
            'avatar' => 'https://api.dicebear.com/9.x/notionists/svg?seed=PriyaSharma&backgroundColor=ffffff',
        ],
        [
            'quote' => 'We needed a custom SaaS from scratch. Codikal designed and built it with clear communication and solid architecture. Highly recommend.',
            'name' => 'Amit Patel',
            'role' => 'Product Lead',
            'company' => 'FinServe',
            'avatar' => 'https://api.dicebear.com/9.x/notionists/svg?seed=AmitPatel&backgroundColor=ffffff',
        ],
    ];

    public array $faqs = [
        [
            'question' => 'What industries do you work with?',
            'answer' => 'We work with startups, healthcare, fintech, logistics, retail, and enterprise teams looking for scalable software products.',
        ],
        [
            'question' => 'Do you provide end-to-end product development?',
            'answer' => 'Yes. We handle discovery, UI/UX, development, testing, deployment, and post-launch support.',
        ],
        [
            'question' => 'Can you modernize existing legacy applications?',
            'answer' => 'Yes. We perform phased modernization, architecture upgrades, and API-first refactoring with minimal business disruption.',
        ],
    ];

    public function render()
    {
        return view('livewire.home-page', [
            'seoTitle' => $this->seoTitle,
            'seoDescription' => $this->seoDescription,
            'seoKeywords' => $this->seoKeywords,
            'canonicalUrl' => url('/'),
            'ogImage' => asset('images/codikal-logo.png'),
        ]);
    }
}
