<div class="container">
  <!-- middle -->
  <div id="middle" class="cols2">

      <div class="title">
      	<h1>{{note.getTitle()}}</h1>
          <div class="post-meta">
              <?php $newDate = explode("-",date("d-m-Y", strtotime($note->getDatePublic())));?>
  	    	<span class="tags"><a href="/<?php echo strtolower($permalink_category);?>"><?php echo ucfirst($note->getNameCategory())?></a></span>
  	        Por
              {% if note.getType()=="OWN"%}
                <a href="/" class="author">{{note.getName()~" "~note.getLastName()~" "}}</a>
              {%else%}
              <a href="/" class="author"><?php echo $note->getType()=="DRAFTING"?"Redacción":"Agencia"; ?></a>
              {%endif%}
                  <span class="separator">|</span>in
                      <a href="/<?php echo strtolower($permalink_category);?>"><?php echo ucfirst($note->getNameCategory())?>
                      </a>
                  <span class="separator">|</span>Publicado: {{newDate[0]~" de "~" "~date[newDate[1]]~" del "~newDate[2]}}
          </div>
      </div>
      <div class="content" role="main">
      	<article class="post-detail">
  			<div class="entry">
                  <div class="frame_box" style="position: relative">
  	                <img src="{{url('dash/img/notes/800x600/'~note.getImage())}}" width="620" height="412" alt="">
                        <?php $result = $note->getDescriptionImage(); if(!empty($result)):?>
                            <h6 class="description_photo">
                                <p>{{note.getDescriptionImage()}}</p>
                            </h6>
                        <?php endif;?>
  	              </div>
                    <blockquote>
                        <p>{{note.getSummary()}}</p>
                    </blockquote>
                    <hr/>
                  <p>{{note.getContent()}}</p>
              <div class="clear"></div>
              </div>

              	<!-- author description -->
                  <div class="author-box">
                      {% if note.getType()=="OWN"%}
                          <div class="author-description">
                  		<div class="author-image">
                              <img src="{{url('dash/assets/images/users/thumbnail/'~note.getPhoto())}}" alt="">
                          </div>
                        	<div class="author-text">
                              <a><span class="author">{{note.getName()}}</span></a>
                              <br/>
                              <p>La Red |  Mundo deportivo</p>
                              <p>{{note.getCargo()}}</p>
                          </div>
                          <div class="clear"></div>
                  	</div>
                      {%else%}
                          <div class="author-description">
                          <div class="author-image">
                              <img src="{{url('dash/assets/images/users/LogoVerde.png')}}" alt="">
                          </div>
                          <div class="author-text">
                              <a>
                                  <span class="author">
                                         <?php echo $note->getType()=="DRAFTING"?"Redacción":"Agencia"; ?>
                                  </span>
                              </a>
                              <br/>
                              <p>La Red |  Mundo deportivo</p>
                          </div>
                          <div class="clear"></div>
                      </div>
                      {%endif%}
                  </div>
                  <!--/ author description -->

          </article>

          <!-- post comments -->
  					<div class="comment-list" id="comments">
                          <div id="disqus_thread"></div>
                          <script type="text/javascript">
                              /* * * CONFIGURATION VARIABLES * * */
                              var disqus_shortname = 'deportesenred';

                              /* * * DON'T EDIT BELOW THIS LINE * * */
                              (function() {
                                  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                  dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                              })();
                          </script>
                          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                          </div>
  				<!--/ post comments -->

  	</div>
      <!--/ content -->

      <!-- sidebar -->
      <div class="sidebar">

          <div class="adv_300">
              <a href="{{advertising[4]['url']}}">
                  <img src="{{url('front/images/slider/'~advertising[4]['image'])}}" width="300" height="250" alt="">
              </a>
          </div>

          <div class="adv_300">
              <a href="{{advertising[5]['url']}}">
                  <img src="{{url('front/images/slider/'~advertising[5]['image'])}}" width="300" height="250" alt="">
              </a>
          </div>
          <div class="adv_300">
              <a href="{{advertising[6]['url']}}">
                  <img src="{{url('front/images/slider/'~advertising[6]['image'])}}"  width="300" height="600" alt="">
              </a>
          </div>
          <div class="adv_300">
              <a href="{{advertising[9]['url']}}">
                  <img src="{{url('front/images/slider/'~advertising[9]['image'])}}" width="300" height="250" alt="">
              </a>
          </div>
          <div class="adv_300">
              <a href="{{advertising[10]['url']}}">
                  <img src="{{url('front/images/slider/'~advertising[10]['image'])}}" width="300" height="250" alt="">
              </a>
          </div>
          <div class="adv_300">
              <a href="{{advertising[8]['url']}}">
                  <img src="{{url('front/images/slider/'~advertising[8]['image'])}}"  width="300" height="600" alt="">
              </a>
          </div>

      </div>
      <!--/ sidebar -->

      <div class="divider"></div>
  </div>
  <!--/ middle -->
</div>
<!--/ container -->
