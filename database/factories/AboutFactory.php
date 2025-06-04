<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ' Software Company in Bangladesh-Tech Lab 33 Ltd.',
            'content' => "<p><strong>Techlab33 Ltd</strong> is a dynamic technology-driven company committed to building innovative, secure, and scalable digital solutions. From web and software development to digital transformation consulting, we combine creativity with cutting-edge technology to help businesses grow and thrive in the digital age.</p>

<h4>🔑 <strong>Key Points:</strong></h4>

<ul>
	<li>
	<p>🚀 Committed to innovation and continuous improvement</p>
	</li>
	<li>
	<p>💡 Focused on problem-solving through smart technology</p>
	</li>
	<li>
	<p>🤝 Client-centric approach with strong communication</p>
	</li>
	<li>
	<p>🛠️ Custom-built, scalable, and secure digital solutions</p>
	</li>
	<li>
	<p>✅ Ethical, transparent, and deadline-oriented delivery</p>
	</li>
</ul>

<h4>⚙️ <strong>Our Core Features:</strong></h4>

<ul>
	<li>
	<p><strong>Full-Stack Development:</strong> Expertise in frontend and backend systems</p>
	</li>
	<li>
	<p><strong>UI/UX Design:</strong> Intuitive and modern design tailored to user needs</p>
	</li>
	<li>
	<p><strong>Cloud Integration:</strong> Scalable apps hosted on secure platforms</p>
	</li>
	<li>
	<p><strong>Maintenance &amp; Support:</strong> Reliable after-delivery technical assistance</p>
	</li>
	<li>
	<p><strong>Agile Process:</strong> Efficient project management with flexible execution</p>
	</li>
</ul>

<p>At <strong>Techlab33</strong>, we don&rsquo;t just deliver projects&mdash;we deliver digital value. Join hands with us and experience technology that works for you.</p>",
            'video_url' => 'https://www.youtube.com/watch?v=XO6lsayFUvQ',
            'clients' => '178',
            'projects' => '453',
            'hoursofsupport' => '1540',
            'workers' => '08',
            'skill_title' => fake()->paragraph(),
            'testimonial_title' => fake()->paragraph()
        ];
    }
}
