<x-mail::message>
# New General Inquiry

A new message has been received from the LinguaVerse contact form.

**Contact Details:**
- **Name:** {{ $contact->name }}
- **Email:** {{ $contact->email }}
- **Phone:** {{ $contact->phone ?? 'N/A' }}

**Subject:** {{ $contact->subject }}

**Message:**  
{{ $contact->message }}

<x-mail::button :url="url('/admin/contacts/' . $contact->id)">
View in CMS
</x-mail::button>

Regards,  
**LinguaVerse Automation**
</x-mail::message>
