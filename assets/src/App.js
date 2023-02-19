import React, { useEffect, useState } from "react";
import axios from "axios";
import PostList from "./components/PostList";
import {
  BrowserRouter as Router,
  Routes, Route, Link
} from 'react-router-dom'
import PostDetail from "./components/PostDetail";


const App = () =>{
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        axios.get("/api/posts")
        .then((response) => {            
          setPosts(response.data.message);
        })
        .catch(error =>{
            console.log(error)
        })
      }, []);
      
      
      
    return (               
      <Router>
        <Routes>
          <Route path="/posts/:id" element={<PostDetail posts={posts} />} />
        </Routes>
        <PostList posts={posts} />
      </Router>        
    )
    
}
export default App