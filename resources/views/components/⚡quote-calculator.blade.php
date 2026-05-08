<?php

use App\Models\QuoteRequest;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component
{
    use WithFileUploads;

    public $step = 1;
    
    // Step 1: Contact
    public $name, $email, $phone, $company;
    
    // Step 2: Project
    public $source_language, $target_language, $service_type;
    
    // Step 3: Message & File
    public $message, $attachment;

    public function nextStep()
    {
        $this->validateStep();
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function validateStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'name' => 'required|min:2',
                'email' => 'required|email',
                'phone' => 'nullable',
                'company' => 'nullable',
            ]);
        } elseif ($this->step == 2) {
            $this->validate([
                'source_language' => 'required',
                'target_language' => 'required',
                'service_type' => 'required',
            ]);
        }
    }

    public function submit()
    {
        $this->validate([
            'message' => 'nullable',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $path = $this->attachment ? $this->attachment->store('quotes', 'public') : null;

        QuoteRequest::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
            'source_language' => $this->source_language,
            'target_language' => $this->target_language,
            'service_type' => $this->service_type,
            'message' => $this->message,
            'attachment' => $path,
            'status' => 'new',
        ]);

        $this->step = 4;
    }
};
?>

<div class="max-w-3xl mx-auto">
    <!-- Progress Header -->
    <div class="mb-12">
        <div class="flex items-center justify-between relative">
            <div class="absolute top-1/2 left-0 w-full h-[1px] bg-white/10 -z-10"></div>
            @foreach([1, 2, 3] as $i)
                <div class="flex flex-col items-center">
                    <div @class([
                        'w-10 h-10 rounded-full flex items-center justify-center font-bold transition-all duration-500',
                        'bg-gold-500 text-navy-950 shadow-[0_0_20px_rgba(201,168,76,0.3)]' => $step >= $i,
                        'bg-navy-900 border border-white/10 text-slate-500' => $step < $i
                    ])>
                        {{ $i }}
                    </div>
                    <span class="text-[10px] uppercase tracking-widest mt-2 text-slate-500">Step {{ $i }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="glass-card p-8 md:p-12 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-gold-500/5 blur-2xl rounded-full"></div>

        @if($step == 1)
            <div wire:key="step1" class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Personal Details</h2>
                    <p class="text-sm text-slate-400 mb-8">Tell us who we'll be working with.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Full Name</label>
                        <input type="text" wire:model="name" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="John Doe">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Email Address</label>
                        <input type="email" wire:model="email" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="john@example.com">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Phone Number</label>
                        <input type="text" wire:model="phone" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="+1 (555) 000-0000">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Company (Optional)</label>
                        <input type="text" wire:model="company" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="Acme Corp">
                    </div>
                </div>

                <div class="pt-8 flex justify-end">
                    <button wire:click="nextStep" class="btn-luxury px-10 py-3 rounded-full text-sm font-bold">
                        Next: Project Details
                    </button>
                </div>
            </div>
        @elseif($step == 2)
            <div wire:key="step2" class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Project Scope</h2>
                    <p class="text-sm text-slate-400 mb-8">Define the linguistic parameters of your request.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Source Language</label>
                        <select wire:model="source_language" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors appearance-none">
                            <option value="">Select Language</option>
                            <option value="English">English</option>
                            <option value="Arabic">Arabic</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                        </select>
                        @error('source_language') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Target Language</label>
                        <select wire:model="target_language" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors appearance-none">
                            <option value="">Select Language</option>
                            <option value="Arabic">Arabic</option>
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                        </select>
                        @error('target_language') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Service Category</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach(['Legal', 'Medical', 'Marketing', 'Technical'] as $type)
                                <label @class([
                                    'cursor-pointer border rounded-xl p-4 text-center transition-all',
                                    'border-gold-500 bg-gold-500/10 text-white' => $service_type == $type,
                                    'border-white/10 bg-navy-950/50 text-slate-400 hover:border-gold-500/50' => $service_type != $type
                                ])>
                                    <input type="radio" wire:model="service_type" value="{{ $type }}" class="hidden">
                                    <span class="text-xs font-bold uppercase tracking-widest">{{ $type }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('service_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="pt-8 flex justify-between">
                    <button wire:click="prevStep" class="px-8 py-3 rounded-full text-sm font-bold border border-white/10 hover:bg-white/5">
                        Back
                    </button>
                    <button wire:click="nextStep" class="btn-luxury px-10 py-3 rounded-full text-sm font-bold">
                        Next: Finalize
                    </button>
                </div>
            </div>
        @elseif($step == 3)
            <div wire:key="step3" class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Final Touches</h2>
                    <p class="text-sm text-slate-400 mb-8">Add any additional requirements and upload your documents.</p>
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Detailed Instructions</label>
                        <textarea wire:model="message" rows="4" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="Tell us more about your project goals..."></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Upload Documents</label>
                        <div class="relative group">
                            <input type="file" wire:model="attachment" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="border-2 border-dashed border-white/10 rounded-2xl p-12 text-center group-hover:border-gold-500/50 transition-all">
                                <div class="w-16 h-16 bg-gold-500/10 rounded-full flex items-center justify-center mx-auto mb-4 text-gold-500">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                </div>
                                <p class="text-sm font-bold text-white mb-1">Click to upload or drag and drop</p>
                                <p class="text-xs text-slate-500">PDF, DOCX, ZIP (Max. 10MB)</p>
                                
                                @if($attachment)
                                    <div class="mt-4 p-2 bg-gold-500/20 rounded-lg text-xs text-gold-400 font-bold">
                                        Selected: {{ $attachment->getClientOriginalName() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @error('attachment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="pt-8 flex justify-between">
                    <button wire:click="prevStep" class="px-8 py-3 rounded-full text-sm font-bold border border-white/10 hover:bg-white/5">
                        Back
                    </button>
                    <button wire:click="submit" class="btn-luxury px-12 py-4 rounded-full text-sm font-bold">
                        Submit Request
                    </button>
                </div>
            </div>
        @elseif($step == 4)
            <div wire:key="success" class="py-12 text-center animate-fade-in">
                <div class="w-20 h-20 bg-gold-500 rounded-full flex items-center justify-center mx-auto mb-8 shadow-[0_0_40px_rgba(201,168,76,0.4)]">
                    <svg class="w-10 h-10 text-navy-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-3xl font-bold mb-4">Request Received</h2>
                <p class="text-slate-400 max-w-sm mx-auto mb-12">
                    Thank you, <span class="text-white font-bold">{{ $name }}</span>. Our concierge team has been notified and will review your project details immediately.
                </p>
                <a href="{{ url('/') }}" class="text-xs font-bold uppercase tracking-widest text-gold-500 hover:text-white transition-colors">
                    Return to Homepage
                </a>
            </div>
        @endif
    </div>
</div>