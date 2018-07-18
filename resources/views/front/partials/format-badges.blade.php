@if ($book->format == 'Book')
    <span>
        <img src="/img/book.png" alt="">
    </span>
@elseif ($book->format == 'Ebook')
    <span>
        <img src="/img/book-badge.png" alt="" style="width:30px;">
    </span>
@elseif ($book->format == 'Audio')
    <span>
        <i class="fa fa-headphones" aria-hidden="true"></i>
    </span>

@endif
