import React, { useEffect, useState } from "react";
import axios from "axios";
import PostList from "./components/PostList";
import PostDetail from "./pages/Post/PostDetail";
import {
  BrowserRouter as Router,
  Routes, Route, Link
} from 'react-router-dom'



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
          <Route path="/" element={<PostList posts={posts} />} />
        </Routes>
      </Router>        
    )
    
}
export default App