<?php

use App\Models\Contact;
use Livewire\Component;

new class extends Component
{
    public $name, $email, $phone, $subject, $message;
    public $success = false;

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ]);

        $contact = Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Send Notification Email
        try {
            \Illuminate\Support\Facades\Mail::to('concierge@linguaverse.com')
                ->send(new \App\Mail\ContactInquiry($contact));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Contact Email failed: ' . $e->getMessage());
        }

        $this->success = true;
        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
    }
};
?>

<div>
    @if($success)
        <div class="glass-card p-12 text-center border-gold-500/50">
            <div class="w-16 h-16 bg-gold-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-navy-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h3 class="text-2xl font-bold mb-4">Message Sent</h3>
            <p class="text-slate-400">Thank you for reaching out. Our concierge team will contact you shortly.</p>
            <button wire:click="$set('success', false)" class="mt-8 text-xs font-bold uppercase tracking-widest text-gold-500 hover:text-white">Send another message</button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="space-y-6">
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
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Phone Number</label>
                    <input type="text" wire:model="phone" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="+1 (555) 000-0000">
                </div>
                <div class="space-y-2">
                    <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Subject</label>
                    <input type="text" wire:model="subject" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="How can we help?">
                    @error('subject') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs uppercase tracking-widest text-gold-500 font-bold">Message</label>
                <textarea wire:model="message" rows="6" class="w-full bg-navy-950/50 border border-white/10 rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-0 transition-colors" placeholder="Your message here..."></textarea>
                @error('message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-luxury w-full py-4 rounded-lg font-bold uppercase tracking-widest text-sm shadow-xl">
                    Send Message
                </button>
            </div>
        </form>
    @endif
</div>