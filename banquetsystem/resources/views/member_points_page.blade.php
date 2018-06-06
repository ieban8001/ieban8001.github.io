<?php
use App\guest_list;
use App\User;
?>
@extends('layout.default')
@section('content')
<body>
<form class="form-horizontal" method="post" action="/insertguest">
{{ csrf_field() }}
<script src="../js/raphael.js"></script>
<script src="../js/Treant.js"></script>
<div id="member_points"></div>

<script type="text/javascript">
    var config = {
        container: "#member_points",
        
        connectors: {
            type: 'step'
        },
        node: {
            HTMLclass: 'nodeExample1'
        }
    },
    
    @foreach($lvl_1 as $lvl1)
    othB{{$lvl1->id}} = {
        text: {
            name: "{{$lvl1->name}}",
            email: "{{$lvl1->email}}",
            points: "RM{{$lvl1->u_points}}",
        },
        //image: "../headshots/2.jpg"
    },
    @endforeach
    
     
    //level 1 onwards
    @php 
    if(!empty($lvl_1_mem)){ 
    @endphp
    @foreach($lvl_1_mem as $lvl1)
    @php
    if($lvl1[0]->m_id!=auth()->id()){
    @endphp
                                 
    othM{{$lvl1[0]->m_id}}= {
        parent: othB{{$lvl1[0]->um_id}},
        text:{
            name: "{{$lvl1[0]->name}}",
            email: "{{$lvl1[0]->email}}",
            points: "RM{{$lvl1[0]->m_points}}",
        },
        stackChildren: true,
        //image: "../headshots/1.jpg"
    },
    @php
    }else{ 
    }   
    @endphp

    @endforeach
    @php
    }else{  }
    @endphp
    
    //level 2 onwards
    @php 
    if(!empty($lvl_2)){ 
    @endphp
    @foreach($lvl_2 as $lvl2)
    @php
    if($lvl2[0]->m_id!=auth()->id()){
    @endphp
                                 
    othM{{$lvl2[0]->m_id}}= {
        parent: othM{{$lvl2[0]->um_id}},
        text:{
            name: "{{$lvl2[0]->name}}",
            email: "{{$lvl2[0]->email}}",
            points: "RM{{$lvl2[0]->m_points}}",
        },
        stackChildren: true,
        //image: "../headshots/1.jpg"
    },
    @php
    }else{ 
    }   
    @endphp

    @endforeach
    @php
    }else{  }
    @endphp

    //level 3 onwards
    @php 
    if(!empty($lvl_3)){ 
    @endphp
    @foreach($lvl_3 as $lvl3)
    @php
    if($lvl3[0]->m_id!=auth()->id()){
    @endphp
                                 
    othM{{$lvl3[0]->m_id}}= {
        parent: othM{{$lvl3[0]->um_id}},
        text:{
            name: "{{$lvl3[0]->name}}",
            email: "{{$lvl3[0]->email}}",
            points: "RM{{$lvl3[0]->m_points}}",
        },
        stackChildren: true,
        //image: "../headshots/1.jpg"
    },
    @php
    }else{ 
    }   
    @endphp

    @endforeach
    @php
    }else{  }
    @endphp

    //level 4 onwards
    @php 
    if(!empty($lvl_4)){ 
    @endphp
    @foreach($lvl_4 as $lvl4)
    @php
    if($lvl4[0]->m_id!=auth()->id()){
    @endphp
                                 
    othM{{$lvl4[0]->m_id}}= {
        parent: othM{{$lvl4[0]->um_id}},
        text:{
            name: "{{$lvl4[0]->name}}",
            email: "{{$lvl4[0]->email}}",
            points: "RM{{$lvl4[0]->m_points}}",
        },
        stackChildren: true,
        //image: "../headshots/1.jpg"
    },
    @php
    }else{ 
    }   
    @endphp

    @endforeach
    @php
    }else{  }
    @endphp

    //level 5 onwards
    @php 
    if(!empty($lvl_5)){ 
    @endphp
    @foreach($lvl_5 as $lvl5)
    @php
    if($lvl5[0]->m_id!=auth()->id()){
    @endphp
                                 
    othM{{$lvl5[0]->m_id}}= {
        parent: othM{{$lvl5[0]->um_id}},
        text:{
            name: "{{$lvl5[0]->name}}",
            email: "{{$lvl5[0]->email}}",
            points: "RM{{$lvl5[0]->m_points}}",
        },
        stackChildren: true,
        //image: "../headshots/1.jpg"
    },
    @php
    }else{ 
    }   
    @endphp

    @endforeach
    @php
    }else{  }
    @endphp

    memL = {
        //parent: ceo,
        text:{
            name: "Kirk Douglas",
            title: "Chief Business Development Officer"
        },
        //image: "../headshots/11.jpg"
    }

    chart_config = [
        config,
        othB<?php echo auth()->id()?>,
        //level 2
        @php 
        if(!empty($lvl_1_mem)){ 
        @endphp
        @foreach($lvl_1_mem as $lvl1)
        @php
        if($lvl1[0]->m_id!=auth()->id()){ 
        @endphp   
        othM{{$lvl1[0]->m_id}},
        @php
        }else{
        }
        @endphp
        @endforeach
        @php
        }else{
            
        }
        @endphp
        //level 2
        @php 
        if(!empty($lvl_2)){ 
        @endphp
        @foreach($lvl_2 as $lvl2)
        @php
        if($lvl2[0]->m_id!=auth()->id()){ 
        @endphp   
        othM{{$lvl2[0]->m_id}},
        @php
        }else{
        }
        @endphp
        @endforeach
        @php
        }else{
            
        }
        @endphp
        //level 3
        @php 
        if(!empty($lvl_3)){ 
        @endphp
        @foreach($lvl_3 as $lvl3)
        @php
        if($lvl3[0]->m_id!=auth()->id()){ 
        @endphp   
        othM{{$lvl3[0]->m_id}},
        @php
        }else{
        }
        @endphp
        @endforeach
        @php
        }else{
            
        }
        @endphp
        //level 4
        @php 
        if(!empty($lvl_4)){ 
        @endphp
        @foreach($lvl_4 as $lvl4)
        @php
        if($lvl4[0]->m_id!=auth()->id()){ 
        @endphp   
        othM{{$lvl4[0]->m_id}},
        @php
        }else{
        }
        @endphp
        @endforeach
        @php
        }else{
            
        }
        @endphp
        //level 5
        @php 
        if(!empty($lvl_5)){ 
        @endphp
        @foreach($lvl_5 as $lvl5)
        @php
        if($lvl5[0]->m_id!=auth()->id()){ 
        @endphp   
        othM{{$lvl5[0]->m_id}},
        @php
        }else{
        }
        @endphp
        @endforeach
        @php
        }else{
            
        }
        @endphp
        //level 6
        @php 
        if(!empty($lvl_6)){ 
        @endphp
        @foreach($lvl_6 as $lvl6)
        @php
        if($lvl6[0]->m_id!=auth()->id()){ 
        @endphp   
        othM{{$lvl6[0]->m_id}},
        @php
        }else{
        }
        @endphp
        @endforeach
        @php
        }else{
            
        }
        @endphp
        memL
    ];

    </script>
    <script>
        new Treant( chart_config );
    </script>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</body>

@stop
