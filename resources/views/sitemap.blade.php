{{ Request::header('Content-Type : text/xml') }}
<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        <url>
            <loc>{{ url('/gallary/'.$post->file_name) }}</loc>
            <lastmod>{{ $post->created_at}}</lastmod>
            <changefreq>{{ $post->name}}</changefreq>
            <priority>1</priority>
        </url>
    @endforeach
</urlset>
