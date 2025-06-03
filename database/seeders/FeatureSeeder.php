<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'title' => 'Custom Software Development',
                'content' => "<p>We provide fully customized software solutions designed to meet the unique goals of your business. Whether you&#39;re a startup needing a prototype or an enterprise streamlining operations, our developers build scalable, secure, and efficient systems using modern technologies. We work closely with clients to ensure every feature aligns with their business objectives.</p>

<p>🔑 <strong>Key Points:</strong></p>

<ul>
	<li>
	<p>Tailored software for specific industries</p>
	</li>
	<li>
	<p>Built with clean, maintainable code</p>
	</li>
	<li>
	<p>Scalable for future growth</p>
	</li>
	<li>
	<p>Agile development methodology</p>
	</li>
</ul>

<p>✅ <strong>Conclusion:</strong><br />
Custom software ensures your business gets exactly what it needs &mdash; no more, no less &mdash; and grows with you.</p>"
            ],
              [
                'title' => 'Cloud Solutions & DevOps',
                'content' => "<p>Our team offers robust cloud computing and DevOps services to help businesses move faster and operate more reliably. From migrating to AWS or Azure to setting up CI/CD pipelines, we ensure your system runs smoothly and scales effortlessly. We also implement best practices for deployment and monitoring.</p>

<p>🔑 <strong>Key Points:</strong></p>

<ul>
	<li>
	<p>Cloud migration and optimization</p>
	</li>
	<li>
	<p>Continuous Integration/Deployment (CI/CD)</p>
	</li>
	<li>
	<p>Infrastructure as Code (IaC)</p>
	</li>
	<li>
	<p>24/7 system monitoring and alerting</p>
	</li>
</ul>

<p>✅ <strong>Conclusion:</strong><br />
Adopting cloud and DevOps enhances flexibility, reliability, and deployment speed, giving your business a modern edge.</p>"
            ],
              [
                'title' => 'Cybersecurity Services',
                'content' => "<p>Security is at the core of every system we build. We provide comprehensive cybersecurity solutions that protect your business from digital threats. This includes regular vulnerability assessments, secure coding practices, encryption protocols, and compliance with major regulations like GDPR and HIPAA. Your data is safe with us.</p>

<p>🔑 <strong>Key Points:</strong></p>

<ul>
	<li>
	<p>Threat detection and mitigation</p>
	</li>
	<li>
	<p>Regular vulnerability scanning</p>
	</li>
	<li>
	<p>Data encryption and secure backups</p>
	</li>
	<li>
	<p>Compliance with global standards</p>
	</li>
</ul>

<p>✅ <strong>Conclusion:</strong><br />
Cybersecurity isn&rsquo;t optional&mdash;it&rsquo;s essential. We help your business stay protected from evolving digital risks and threats.</p>"
            ],
             [
                'title' => 'Mobile App Development',
                'content' => "<p>We design and develop mobile applications for Android and iOS platforms that offer seamless performance and delightful user experiences. Whether it&rsquo;s a native or cross-platform solution, our apps are crafted with intuitive UI/UX and strong backends. From concept to launch, we guide you through every step.</p>

<p>🔑 <strong>Key Points:</strong></p>

<ul>
	<li>
	<p>Native and hybrid app options</p>
	</li>
	<li>
	<p>Flutter, React Native, Swift, Kotlin</p>
	</li>
	<li>
	<p>UX/UI design focused on users</p>
	</li>
	<li>
	<p>App store optimization and publishing</p>
	</li>
</ul>

<p>✅ <strong>Conclusion:</strong><br />
Your mobile app will not only look great but also function smoothly and scale with your business needs.</p>"
            ],
            [
                'title' => 'Data Analytics & AI Integration',
                'content' => "<p>We help businesses unlock the true value of their data using modern analytics and AI. From dashboards that visualize performance to predictive models that improve decision-making, our solutions empower you with actionable insights. Machine learning and automation drive business growth and efficiency.</p>

<p>🔑 <strong>Key Points:</strong></p>

<ul>
	<li>
	<p>Business Intelligence dashboard design</p>
	</li>
	<li>
	<p>Predictive and prescriptive analytics</p>
	</li>
	<li>
	<p>AI-based process automation</p>
	</li>
	<li>
	<p>Integration with existing systems</p>
	</li>
</ul>

<p>✅ <strong>Conclusion:</strong><br />
Data-driven decisions powered by AI keep your business ahead of competitors and ready for the future.</p>"
            ],
         
        ];
       



        foreach($data as $item){
            Feature::factory()->create([
                'title' => $item['title'],
                'content' => $item['content'],
            ]);
        }
    }
}
