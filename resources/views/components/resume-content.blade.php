@props(['resume'])

<div {{ $attributes->merge(['class' => 'space-y-8']) }}>
    <!-- Header Section -->
    <section>
        <div class="flex items-center gap-2">
            <span class="keyword">class</span>
            <span class="type">Developer</span>
            <span>{</span>
        </div>
        <div class="ml-6 mt-2 space-y-1">
            <div>
                <span class="keyword">public string</span>
                <span class="variable">$name</span> =
                <span class="string">"{{ $resume->full_name }}"</span>;
            </div>
            <div>
                <span class="keyword">public string</span>
                <span class="variable">$role</span> =
                <span class="string">"{{ $resume->title }}"</span>;
            </div>
            <div>
                <span class="keyword">public string</span>
                <span class="variable">$level</span> =
                <span class="string">"{{ $resume->level }}"</span>;
            </div>
            <div>
                <span class="keyword">public string</span>
                <span class="variable">$location</span> =
                <span class="string">"{{ $resume->location }}"</span>;
            </div>
            <div>
                <span class="keyword">public string</span>
                <span class="variable">$email</span> =
                <span class="string">"{{ $resume->email }}"</span>;
            </div>
            @if($resume->links)
                @foreach($resume->links as $platform => $url)
                    <div>
                        <span class="keyword">public string</span>
                        <span class="variable">${{ $platform }}</span> =
                        <a href="{{ $url }}" target="_blank" class="string hover:underline cursor-pointer group">
                            "{{ $url }}"<span class="hidden group-hover:inline text-terminal-gray text-xs ml-2">// Click to open</span>
                        </a>;
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Summary Section -->
    <section class="ml-6">
        <div class="comment">/**</div>
        <div class="comment"> * {{ $resume->summary }}</div>
        <div class="comment"> */</div>
    </section>

    <!-- Skills Section -->
    <section class="ml-6">
        <div>
            <span class="keyword">public array</span>
            <span class="variable">$skills</span> = [
        </div>
        <div class="ml-6">
            @foreach($resume->skills as $category => $items)
                <div>
                    <span class="string">'{{ $category }}'</span> => [
                    @foreach($items as $skill)
                        <span class="string">'{{ $skill }}'</span>{{ !$loop->last ? ',' : '' }}
                    @endforeach
                    ],
                </div>
            @endforeach
        </div>
        <div>];</div>
    </section>

    <!-- Experiences Section -->
    <section class="ml-6">
        <div>
            <span class="keyword">public function</span>
            <span class="function">getExperiences</span>(): <span class="type">array</span>
        </div>
        <div>{</div>
        <div class="ml-6">
            <span class="keyword">return</span> [
            @foreach($resume->experiences as $exp)
                <div class="ml-6 mb-2">
                    <span class="comment">// {{ $exp['period'] }}</span><br>
                    <span class="string">'{{ $exp['company'] }}'</span> => [
                        <span class="string">'position'</span> => <span class="string">'{{ $exp['title'] }}'</span>,
                        <span class="string">'tasks'</span> => <span class="string">'{{ $exp['description'] }}'</span>
                    ],
                </div>
            @endforeach
            ];
        </div>
        <div>}</div>
    </section>

    <!-- Projects Section -->
    <section class="ml-6">
        <div>
            <span class="keyword">public function</span>
            <span class="function">getProjects</span>(): <span class="type">array</span>
        </div>
        <div>{</div>
        <div class="ml-6">
            <span class="keyword">return</span> [
            @foreach($resume->projects as $project)
                <div class="ml-6 mb-2">
                    <span class="string">'{{ $project['name'] }}'</span> => [
                        <span class="string">'description'</span> => <span class="string">'{{ $project['description'] }}'</span>,
                        <span class="string">'stack'</span> => [<span class="string">'{{ implode("', '", $project['tech']) }}'</span>],
                        <span class="string">'url'</span> =>
                        <a href="{{ $project['url'] }}" target="_blank" class="type string hover:underline cursor-pointer group italic">
                            '{{ $project['url'] }}'<span class="hidden group-hover:inline text-terminal-gray text-xs ml-2">// View project</span>
                        </a>
                    ],
                </div>
            @endforeach
            ];
        </div>
        <div>}</div>
    </section>

    <!-- Education Section -->
    <section class="ml-6">        <div>
            <span class="keyword">public function</span>
            <span class="function">getEducation</span>(): <span class="type">array</span>
        </div>
        <div>{</div>
        <div class="ml-6">
            <span class="keyword">return</span> [
            @foreach($resume->education as $edu)
                <div class="ml-6 mb-2">
                    <span class="comment">// {{ $edu['year'] }}</span><br>
                    <span class="string">'{{ $edu['school'] }}'</span> => <span class="string">'{{ $edu['degree'] }}'</span>,
                </div>
            @endforeach
            ];
        </div>
        <div>}</div>
    </section>

    <div class="mt-4">
        <span>}</span>
        <span class="comment">// End of class</span>
    </div>
</div>
