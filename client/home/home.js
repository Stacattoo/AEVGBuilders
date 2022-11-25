$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "homeProcess.php",
        data: { getFeedback: true },
        dataType: "JSON",
        success: function (response) {
            let content = `<div class="swiper-slide">
            <div class="content-wrapper">
                <div class="content">
                    <div class="swiper-avatar"><img src="https://bikes-n-stuff.com/wp-content/uploads/sb-instagram-feed-images/julietelliott.jpg">
                    </div>
                    <p>"Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio
                        sem
                        nec elit. Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam.
                        Pellentesque ornare sem lacinia quam venenatis vestibulum."</p>
                    <p class="cite">- Juliet Elliott, Cyclist</p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="content-wrapper">
                <div class="content">
                    <div class="swiper-avatar"><img src="https://dgtzuqphqg23d.cloudfront.net/aqUDdv8fco91cPIeBAetAcpDfUEOIuaIrivU11PMnBs-2048x1942.jpg">
                    </div>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere consectetur est
                        at
                        lobortis. Nullam id dolor id nibh ultricies vehicula ut id elit. Curabitur blandit
                        tempus porttitor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                        eget
                        lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at
                        eros."</p>
                    <p class="cite">- Katie Kookaburra, Cyclist</p>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="content-wrapper">
                <div class="content">
                    <div class="swiper-avatar"><img src="https://dgalywyr863hv.cloudfront.net/pictures/athletes/188112/45714/8/full.jpg">
                    </div>
                    <p>"Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio
                        sem
                        nec elit. Donec id elit non mi porta gravida at eget metus. Aenean eu leo quam.
                        Pellentesque ornare sem lacinia quam venenatis vestibulum."</p>
                    <p class="cite">- Alison Tetrick, Cyclist</p>
                </div>
            </div>
        </div>`;
            $.each(response, function (indexInArray, data) {
                content = `
                    <div class="swiper-slide">
                        <div class="content-wrapper">
                            <div class="content">
                                <div class="swiper-avatar"><img src="../profile/${data.image}">
                                </div>
                                <p>"${data.feedback}"</p>
                                <p class="cite">- ${data.fullname}</p>
                            </div>
                        </div>
                    </div>
            `;
            });

            $("#feedbackContent").html(content);
        }
        
    });
});