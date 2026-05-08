<x-mail::message>
# New Quote Request Received

A new translation project request has been submitted through the LinguaVerse concierge portal.

**Client Details:**
- **Name:** {{ $quoteRequest->name }}
- **Email:** {{ $quoteRequest->email }}
- **Phone:** {{ $quoteRequest->phone ?? 'N/A' }}
- **Company:** {{ $quoteRequest->company ?? 'N/A' }}

**Project Parameters:**
- **Service Type:** {{ $quoteRequest->service_type }}
- **Source Language:** {{ $quoteRequest->source_language }}
- **Target Language:** {{ $quoteRequest->target_language }}

**Message:**
{{ $quoteRequest->message ?? 'No additional instructions provided.' }}

@if($quoteRequest->attachment)
<x-mail::button :url="asset('storage/' . $quoteRequest->attachment)">
View Attached Document
</x-mail::button>
@endif

<x-mail::button :url="url('/admin/quote-requests/' . $quoteRequest->id)">
Manage Request in CMS
</x-mail::button>

Regards,  
**LinguaVerse Automation**
</x-mail::message>
